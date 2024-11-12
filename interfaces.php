<?php

interface PaymentType
{
    public const CLIENT_ID = 1;

    public function pay(float $amount): bool;
}


abstract class AbstractPaymentType implements PaymentType
{
    protected object $account;

    public function __construct()
    {
        $this->account = (object)[
            'slug' => 'main_account',
            'balance' => 1000,
        ];
    }

    public function getAccount(): object
    {
        return $this->account;
    }
}

class PaymentFactory
{
    /**
     * @return PaymentType
     * Метод не содержит входные параметры, так как этого не было в задаче
     */
    public static function createPayment(): PaymentType
    {
        return new ConcretePayment();
    }
}

class ConcretePayment extends AbstractPaymentType
{
    public function pay(float $amount): bool
    {
        if ($this->account->balance >= $amount) {
            $this->account->balance -= $amount;
            return true;
        }
        return false;
    }
}

$payment = PaymentFactory::createPayment();
$accountBefore = $payment->getAccount();
echo "Баланс до платежа: " . $accountBefore->balance . "\n";

if ($payment->pay(200)) {
    echo "Платеж успешен.\n";
} else {
    echo "Платеж не прошел. Недостаточно средств.\n";
}

$accountAfter = $payment->getAccount();
echo "Баланс после платежа: " . $accountAfter->balance . "\n";
