<?php

    namespace App\Models;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable
    {
        use HasApiTokens, HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            "name",
            "about",
            "avatar",
            "email",
            "password",
            "role"
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            "password",
            "remember_token",
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            "email_verified_at" => "datetime",
        ];

        /**
         * Define relationship for posts model
         *
         * @return HasMany
         */
        public function posts(): HasMany
        {
            return $this->hasMany(Post::class);
        }
        /**
         * Check to see if the user is an admin
         *
         * @return bool
         */
        public function isAdmin(): bool
        {
            return $this->role === "admin";
        }

        /**
         * Make the selected user an admin
         * @return bool
         */
        public function makeAdmin(): bool
        {
            $this->role = "admin";

            $this->save();

            return true;
        }

        /**
         * Make the selected user an writer
         * @return bool
         */
        public function makeWriter(): bool
        {
            $this->role = "writer";

            $this->save();

            return true;
        }
    }
