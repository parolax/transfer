<?php

namespace TestTransfer;
class Transfer implements TransferInterface, PaymentStatusInterface
{
	private string $status;
	private Company $senderCompany;
	private Company $receiverCompany;
	private float $amount;
	private string $dateTime;

	public function __construct(string $status, Company $senderCompany, Company $receiverCompany, float $amount, string $dateTime)
	{
		$this->status = $status;
		$this->senderCompany = $senderCompany;
		$this->receiverCompany = $receiverCompany;
		$this->amount = $amount;
		$this->dateTime = $dateTime;
	}

	public function getStatus(): string
	{
		return $this->status;
	}

	public function getSenderCompany(): Company
	{
		return $this->senderCompany;
	}

	public function getReceiverCompany(): Company
	{
		return $this->receiverCompany;
	}

	public function getAmount(): float
	{
		return $this->amount;
	}

	public function getDateTime(): string
	{
		return $this->dateTime;
	}

	public function processTransfer(): void
	{
		try {
			if ($this->status === PaymentStatusInterface::PENDING) {
				$senderBalance = $this->senderCompany->getBalance();
				$receiverBalance = $this->receiverCompany->getBalance();

				if ($senderBalance >= $this->amount) {
					$this->senderCompany->updateBalance(-$this->amount);
					$this->receiverCompany->updateBalance($this->amount);
					$this->status = PaymentStatusInterface::SUCCESS;
				} else {
					throw new \Exception("Insufficient balance for transfer");
				}
			}
		} catch (\Exception $e) {
			$this->status = PaymentStatusInterface::FAILED;
			echo "Error: " . $e->getMessage() . PHP_EOL;
		}
	}
}
