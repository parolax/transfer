<?php

namespace TestTransfer;

interface PaymentStatusInterface
{
	public const PENDING = 'Pending';
	public const SUCCESS = 'Success';
	public const FAILED = 'Failed';
}
