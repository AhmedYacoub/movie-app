<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Cast
 *
 * @property int $id
 * @property int $tmdb_id
 * @property string $name
 * @property string $slug
 * @property string $poster_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cast newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cast newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cast query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cast whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cast whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cast whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cast wherePosterPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cast whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cast whereTmdbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cast whereUpdatedAt($value)
 */
	class Cast extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Episode
 *
 * @property int $id
 * @property int $tmdb_id
 * @property int $season_id
 * @property string $name
 * @property string $slug
 * @property string $overview
 * @property int $episode_number
 * @property int $is_public
 * @property int $visits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereEpisodeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereTmdbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereVisits($value)
 */
	class Episode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Genre
 *
 * @property int $id
 * @property int $tmdb_id
 * @property string $title
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereTmdbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereUpdatedAt($value)
 */
	class Genre extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Movie
 *
 * @property int $id
 * @property int $tmdb_id
 * @property string $title
 * @property string $slug
 * @property string $overview
 * @property string $release_date
 * @property string $runtime
 * @property string $language
 * @property string $poster_path
 * @property string|null $backdrop_path
 * @property string $video_format
 * @property int $is_public
 * @property int $visits
 * @property string $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereBackdropPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePosterPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereRuntime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTmdbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereVideoFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereVisits($value)
 */
	class Movie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Season
 *
 * @property int $id
 * @property int $tmdb_id
 * @property int $tv_show_id
 * @property string $title
 * @property string $slug
 * @property int $season_number
 * @property string $poster_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season query()
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season wherePosterPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereSeasonNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereTmdbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereTvShowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereUpdatedAt($value)
 */
	class Season extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Trailer
 *
 * @property int $id
 * @property string $name
 * @property string $embed_html
 * @property string $trailerable_type
 * @property int $trailerable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer whereEmbedHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer whereTrailerableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer whereTrailerableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trailer whereUpdatedAt($value)
 */
	class Trailer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TvShow
 *
 * @property int $id
 * @property int $tmdb_id
 * @property string $title
 * @property string $slug
 * @property string $year_created
 * @property string $poster_path
 * @property int $visits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow query()
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow wherePosterPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow whereTmdbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow whereVisits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TvShow whereYearCreated($value)
 */
	class TvShow extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

