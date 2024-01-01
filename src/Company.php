<?php

namespace TestTransfer;

class Company
{
	private string $inn;
	private string $name;
	private float $balance;

	public function __construct(string $inn, string $name, float $balance)
	{
		$this->inn = $inn;
		$this->name = $name;
		$this->balance = $balance;
	}

	public function getInn(): string
	{
		return $this->inn;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getBalance(): float
	{
		return $this->balance;
	}

	public function updateBalance(float $amount): void
	{
		$this->balance += $amount;
	}
}
