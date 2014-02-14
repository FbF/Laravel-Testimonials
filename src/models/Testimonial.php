<?php namespace Fbf\LaravelTestimonials;

class Testimonial extends \Eloquent {

	/**
	 * Status values for the database
	 */
	const DRAFT 	= 'DRAFT';
	const APPROVED 	= 'APPROVED';

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_testimonials';

	/**
	 * @var bool
	 */
	protected $softDelete = true;

	/**
	 * Used for Cviebrock/EloquentSluggable
	 * @var array
	 */
	public static $sluggable = array(
		'build_from' => 'title',
		'save_to'    => 'slug',
		'separator' => '-',
		'unique' => true,
		'include_trashed' => true,
	);

	/**
	 * Used to store the old image value, set during model updating event before the model is actually updated
	 * Used to compare with the new image value after saving the model, so we can work out whether we need to
	 * recalculate the image width and height
	 * @var string
	 */
	protected $oldImage = null;

	/**
	 *
	 */
	public static function boot()
	{
		parent::boot();

		static::created(function($testimonial)
		{
			// If the record is being created and there is a "main image" supplied, set it's width and height
			if (!empty($testimonial->image))
			{
				$testimonial->updateImageSize();
			}
		});

		static::updating(function($testimonial)
		{
			// If the record is about to be updated and there is an "image" supplied, get the current image
			// value so we can compare it to the new one
			$testimonial->oldImage = self::where('id','=',$testimonial->id)->first()->pluck('image');
			return true;
		});

		static::updated(function($testimonial)
		{
			// If the image has changed, and the save was successful, update the database with the new width and height
			if (isset($testimonial->oldImage) && $testimonial->oldImage <> $testimonial->image)
			{
				$testimonial->updateImageSize();
			}
		});

	}

	/**
	 * Triggered from madel save events, it updates the image width and height fields to the values of the
	 * uploaded image.
	 */
	protected function updateImageSize()
	{
		// Get path to main image
		$pathToImage = public_path() . self::getImageConfig('resized', 'dir') . $this->image;
		if (is_file($pathToImage) && file_exists($pathToImage))
		{
			list($width, $height) = getimagesize($pathToImage);
		}
		else
		{
			$width = $height = null;
		}
		// Update the database, use DB::table()->update approach so as not to trigger the Eloquent save() event again.
		\DB::table($this->getTable())
			->where('id', $this->id)
			->update(array(
				'image_width' => $width,
				'image_height' => $height,
			));
	}

	/**
	 * Returns the testimonial object for the given slug
	 * @param $slug
	 * @return mixed
	 */
	public static function get($slug)
	{
		return self::where('slug','=',$slug)
			->where('status','=',self::APPROVED)
			->where('published_date','<=',\Carbon\Carbon::now())
			->first();
	}

	public function getUrl()
	{
		return \URL::action('Fbf\LaravelTestimonials\TestimonialsController@view', array('slug' => $this->slug));
	}

	/**
	 * Returns the config setting for the image
	 *
	 * @param $size
	 * @param $property
	 * @return mixed
	 */
	public static function getImageConfig($size, $property)
	{
		$config = 'laravel-testimonials::image.';
		if ($size == 'original')
		{
			$config .= 'original.';
		}
		elseif (!is_null($size))
		{
			$config .= 'sizes.' . $size . '.';
		}
		$config .= $property;
		return \Config::get($config);
	}

	/**
	 * Returns the HTML img tag for the requested image size for this testimonial
	 *
	 * @param $size
	 * @return null|string
	 */
	public function getImage($size)
	{
		if (empty($this->image))
		{
			return null;
		}
		if ($size == 'resized')
		{
			$width = $this->image_width;
			$height = $this->image_height;
		}
		elseif ($size == 'thumbnail')
		{
			$width = self::getImageConfig($size, 'width');
			$height = self::getImageConfig($size, 'height');
		}
		$html = '<img src="' . self::getImageConfig($size, 'dir') . $this->image . '"';
		$html .= ' alt="' . $this->image_alt . '"';
		$html .= ' width="' . $width . '"';
		$html .= ' height="' . $height . '" />';
		return $html;
	}

	public function getYouTubeThumbnailImage()
	{
		return str_replace('%YOU_TUBE_VIDEO_ID%', $this->you_tube_video_id, \Config::get('laravel-testimonials::you_tube.thumbnail_code'));
	}

	public function getYouTubeEmbedCode()
	{
		return str_replace('%YOU_TUBE_VIDEO_ID%', $this->you_tube_video_id, \Config::get('laravel-testimonials::you_tube.embed_code'));
	}

}