<?php

namespace App\Console;

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
        //
    ];


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
            
            if (!empty($tarefa->id_ava)) {
                $execucao = $schedule->command($tarefa->tx_nome_comando,[$tarefa->id_ava])
                    ->cron($cron)->timezone('America/Sao_paulo')->withoutOverlapping(); // Executa com parametro de AVA
            } else {
                $execucao = $schedule->command($tarefa->tx_nome_comando)
                    ->cron($cron)->timezone('America/Sao_paulo')->withoutOverlapping(); // Executa SEM parametro de AVA
            }

            $horaAtual = Carbon::now()->timezone('America/Sao_Paulo');
            $diffMinutos = $execucao->nextRunDate()->timezone('America/Sao_Paulo')->diffInMinutes($horaAtual);
            $proximaExecucao = date('Y-m-d\TH:i:s\Z', $execucao->nextRunDate()->timestamp);

            // Salva proxima execucao e a ultima
            $tarefaAgendada = TarefasAgendadas::find($tarefa->getKey());
            $tarefaAgendada->dt_proximo_periodo = $proximaExecucao;
            if ($diffMinutos == 0) { // Se igual a 0, quer dizer que esta a menos de 60s da execucao
                $horaAtual->addMinute(1);
                // Salva antes da execucao de fato, nao consegui identificar quando a execucao ocorre
                $tarefaAgendada->dt_ultimo_periodo = $horaAtual;
            }
            $tarefaAgendada->save();
            
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
