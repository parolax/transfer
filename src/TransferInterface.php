<?php

namespace TestTransfer;
interface TransferInterface
{
	public function getStatus(): string;

	public function getSenderCompany(): Company;

	public function getReceiverCompany(): Company;

	public function getAmount(): float;

	public function getDateTime(): string;

	public function processTransfer(): void;
}
