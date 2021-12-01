<?php


namespace App\Services;


use App\Models\Customer;
use App\Models\Request;
use Illuminate\Support\Facades\DB;

class RequestCreator
{
    public function createRequest(string $descricao,
                                  string $nome,
                                  string $email,
                                  string $cep,
                                  string $rua,
                                  string $cidade,
                                  string $bairro,
                                  string $numero,
                                  ?string $complemento
    )
    {

        DB::begintransaction();
        $requestCustomer = Request::create([
            'descricao' => $descricao,
            'data_registro' => new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'))
        ]);
        $this->createCustomer(
            $requestCustomer,
            $nome,
            $email,
            $cep,
            $rua,
            $cidade,
            $bairro,
            $numero,
            $complemento
        );
        DB::commit();

        return $requestCustomer;

    }

    private function createCustomer($requestCustomer,
                                   string $nome,
                                   string $email,
                                   string $cep,
                                   string $rua,
                                   string $cidade,
                                   string $bairro,
                                   string $numero,
                                   ?string $complemento): void
    {
        $customer = $requestCustomer->customers()->create([
            'nome' => $nome,
            'email' => $email
        ]);

        $this->createAddress($customer, $cep, $rua, $cidade, $bairro, $numero, $complemento);
    }

    /**
     * @param $customer
     * @param $cep
     * @param $rua
     * @param $cidade
     * @param $bairro
     * @param $numero
     * @param $complemento
     */
    private function createAddress(Customer $customer, $cep, $rua, $cidade, $bairro, $numero, $complemento): void
    {
        $customer->addresses()->create([
            'cep' => $cep,
            'rua' => $rua,
            'cidade' => $cidade,
            'bairro' => $bairro,
            'numero' => $numero,
            'complemento' => $complemento
        ]);
    }
}
