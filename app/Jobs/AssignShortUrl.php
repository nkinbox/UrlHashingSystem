<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\UrlRequest;
use App\Models\Hash;
use App\Jobs\CreateShortUrls;
use App\Models\Url;

class AssignShortUrl implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UrlRequest $url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hash = Hash::where('is_available', true)->first();
        if($hash) {
            $hash->is_available = false;
            $hash->save();
            $this->url->short_url = $hash->value;
            $this->url->is_active = true;
            $this->url->save();

            // publish this URL
            $publish = new Url;
            $publish->short_url = $this->url->short_url;
            $publish->long_url = $this->url->long_url;
            $publish->is_once = $this->url->is_once;
            $publish->is_active = $this->url->is_active;
            $publish->save();
        } else {
            CreateShortUrls::dispatch();
            self::dispatch($this->url)->delay(now()->addMinutes(1));
        }
    }
}
