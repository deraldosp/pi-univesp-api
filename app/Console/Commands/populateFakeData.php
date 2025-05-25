<?php

namespace App\Console\Commands;

use App\Models\Beneficiario;
use App\Models\Beneficio;
use App\Models\Distribuicao;
use App\Models\Doacoes;
use App\Models\Doadores;
use Carbon\Carbon;
use Illuminate\Console\Command;

class populateFakeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-fake-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Criando beneficiarios... ");
        $beneficiarios = Beneficiario::factory()->count(30)->create();
        sleep(1);
        $this->info("Beneficiarios criados! ...registrando distribuição de beneficios");

        foreach ($beneficiarios as $beneficiario) {
            $dataInicial = Carbon::createFromFormat('Y-m-d', '2025-01-15');

            for ($i=1; $i <= 5; $i++) {
                $entrega = Distribuicao::create([
                    'beneficiarios_id' => $beneficiario->id,
                    'beneficios_id' => 2,
                    'unidade_beneficente_id' => 1,
                    'data_entrega' => $dataInicial,
                    'quantidade' => fake()->numberBetween(1,3),
                    'created_by_id' => 1
                ]);
                $entrega->created_at = $dataInicial;
                $entrega->updated_at = $dataInicial;
                $entrega->save();
                $dataInicial->addMonths(1);
            }
        }
        sleep(1);
        $this->info("Beneficios registrados!");


        $this->info("Criando Doadores... ");

        $doadores = Doadores::factory()->count(22)->create();
        sleep(1);

        $this->info("Doadores criados! ...registrando doações");

        foreach ($doadores as $doador) {
            $dataInicial = Carbon::createFromFormat('Y-m-d', '2025-01-05');
            for ($i=1; $i <= 5; $i++) {
                $tipoDoacao = fake()->numberBetween(1, 2);
                $valor = $tipoDoacao === 2 ? fake()->randomElement([50.00, 100.00, 120.00, 150.00, 200.00]) : 0.00;
                $doacao = Doacoes::create([
                    'doadores_id' => $doador->id,
                    'tipo_id' => $tipoDoacao,
                    'unidade_id' => 1,
                    'quantidade' => $tipoDoacao === 1 ? fake()->numberBetween(1, 5) : 1,
                    'valor' => $valor,
                    'judicial' => $valor === 120.00 ? 1 : 0
                ]);
                $doacao->created_at = $dataInicial;
                $doacao->updated_at = $dataInicial;
                $doacao->save();
                $dataInicial->addMonths(1);
            }
        }
        sleep(1);
        $this->info('Concluido!');

    }
}
