<?php

    namespace App\Services;

    use Illuminate\Support\Facades\File;
    use App\Models\Transportadora;
    use App\Models\Entrega;
    use App\Models\Remetente;
    use App\Models\Destinatario;
    use App\Models\Rastreamento;

    class ApiService
    {
        public function importarMocks(): void
        {
            $this->importarTransportadoras();
            $this->importarEntregas();
        }

        private function importarTransportadoras(): void
        {
            $path = app_path('Mocks/API_LISTAGEM_TRANSPORTADORAS.json');
            $json = json_decode(File::get($path), true);

            foreach ($json['data'] as $item) {
                Transportadora::updateOrCreate(
                    ['id' => $item['_id']],
                    [
                        'cnpj' => (string) $item['_cnpj'],
                        'fantasia' => $item['_fantasia'],
                    ]
                );
            }
        }

        private function importarEntregas(): void
        {
            $path = app_path('Mocks/API_LISTAGEM_ENTREGAS.json');
            $json = json_decode(File::get($path), true);

            foreach ($json['data'] as $item) {
                $entrega = Entrega::updateOrCreate(
                    ['id' => $item['_id']],
                    [
                        'transportadora_id' => $item['_id_transportadora'],
                        'volumes' => $item['_volumes'],
                        'cpf_destinatario' => $item['_destinatario']['_cpf'],
                    ]
                );

                Remetente::updateOrCreate(
                    ['entrega_id' => $entrega->id],
                    ['nome' => $item['_remetente']['_nome']]
                );

                $dest = $item['_destinatario'];
                Destinatario::updateOrCreate(
                    ['entrega_id' => $entrega->id],
                    [
                        'nome' => $dest['_nome'],
                        'cpf' => $dest['_cpf'],
                        'endereco' => $dest['_endereco'] ?? null,
                        'estado' => $dest['_estado'] ?? null,
                        'cep' => $dest['_cep'] ?? null,
                        'pais' => $dest['_pais'] ?? null,
                        'latitude' => $dest['_geolocalizao']['_lat'] ?? null,
                        'longitude' => $dest['_geolocalizao']['_lng'] ?? null,
                    ]
                );

                foreach ($item['_rastreamento'] as $track) {
                    Rastreamento::updateOrCreate(
                        [
                            'entrega_id' => $entrega->id,
                            'mensagem' => $track['message'],
                            'data' => date('Y-m-d H:i:s', strtotime($track['date'])),
                        ]
                    );
                }
            }
        }
    }
?>