<?php
namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use App\Mail\PengumumanNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Exception;

class SendPengumumanEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $partisipan;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($partisipan, $data)
    {
        $this->partisipan = $partisipan;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to($this->partisipan->email)->send(new PengumumanNotify($this->data));
            Log::info($this->partisipan->email);
        } catch (Exception $e) {
            Log::error('Gagal mengirim email ke: ' . $this->partisipan->email . ' - Error: ' . $e->getMessage());
        }
    }
}
