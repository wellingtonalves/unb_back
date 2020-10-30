<?php

namespace App\Console;

use App\Console\Commands\DuplicaOfertasAva;
use App\Repositories\TarefaAgendadaRepository;
use App\Services\TarefaAgendadaService;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        DuplicaOfertasAva::class
    ];

    /**
     * @var \DateTime
     */
    protected $horaExecucao;

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $tarefaAgendadaService = new TarefaAgendadaService(new TarefaAgendadaRepository(app()));
        foreach ($tarefaAgendadaService->buscaTarefasPorSituacao('A') as $tarefa) {
            
            $cron = "{$tarefa->tx_minuto} {$tarefa->tx_hora} {$tarefa->tx_dia_mes} {$tarefa->tx_mes} {$tarefa->tx_dia_semana}";
            
            $ava = empty($tarefa->id_ava) ? [] : [$tarefa->id_ava];

            $this->horaExecucao = null;
            $execucao = $schedule->command($tarefa->tx_nome_comando,$ava)->cron($cron)
                ->onOneServer()
                ->after(function () {
                    $this->horaExecucao = Carbon::now();
                });

            $tarefa->dt_proximo_periodo = date('Y-m-d\TH:i:s\Z', $execucao->nextRunDate()->timestamp);

            if (!empty($this->horaExecucao)) {
                $tarefa->dt_ultimo_periodo = $this->horaExecucao;
            }
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
