<?php

require_once 'vendor/autoload.php';

use TestTransfer\Company;
use TestTransfer\PaymentStatusInterface;
use TestTransfer\Transfer;
use TestTransfer\TransferInterface;

// Пример использования
$company1 = new Company('11111111', 'Компания 1', 1000.0);
$company2 = new Company('22222222', 'Компания 2', 5.0);

$transfer = new Transfer(PaymentStatusInterface::PENDING, $company1, $company2, 300.0, '2023-12-26 13:30:00');

echo '============================================================' . PHP_EOL;
echo "Balance for Company 1: " . $company1->getBalance() . PHP_EOL;
echo "Balance for Company 2: " . $company2->getBalance() . PHP_EOL;
echo '============================================================' . PHP_EOL;
echo "Transfer Status: " . $transfer->getStatus() . PHP_EOL;
echo "Sender Company: " . $transfer->getSenderCompany()->getName() . PHP_EOL;
echo "Receiver Company: " . $transfer->getReceiverCompany()->getName() . PHP_EOL;
echo "Amount: " . $transfer->getAmount() . PHP_EOL;
echo "DateTime: " . $transfer->getDateTime() . PHP_EOL;

$transfer->processTransfer();

echo "Updated Transfer Co1->Co2->300 Status: " . $transfer->getStatus() . PHP_EOL;
echo "New Balance for Company 1: " . $company1->getBalance() . PHP_EOL;
echo "New Balance for Company 2: " . $company2->getBalance() . PHP_EOL;
echo '============================================================' . PHP_EOL;

$transfer2 = new Transfer(PaymentStatusInterface::PENDING, $company2, $company1, 400.0, '2023-12-26 13:30:10');

echo '============================================================' . PHP_EOL;
echo "Balance for Company 1: " . $company1->getBalance() . PHP_EOL;
echo "Balance for Company 2: " . $company2->getBalance() . PHP_EOL;
echo '============================================================' . PHP_EOL;
echo "Transfer Status: " . $transfer2->getStatus() . PHP_EOL;
echo "Sender Company: " . $transfer2->getSenderCompany()->getName() . PHP_EOL;
echo "Receiver Company: " . $transfer2->getReceiverCompany()->getName() . PHP_EOL;
echo "Amount: " . $transfer2->getAmount() . PHP_EOL;
echo "DateTime: " . $transfer2->getDateTime() . PHP_EOL;

$transfer2->processTransfer();

echo "Updated Transfer2 Co2->Co1->400 Status: " . $transfer2->getStatus() . PHP_EOL;
echo "New Balance for Company 1: " . $company1->getBalance() . PHP_EOL;
echo "New Balance for Company 2: " . $company2->getBalance() . PHP_EOL;
echo '============================================================' . PHP_EOL;

print_r($company1);
print_r($company2);
