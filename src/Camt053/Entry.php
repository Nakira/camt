<?php
namespace Genkgo\Camt\Camt053;

use BadMethodCallException;
use DateTimeImmutable;
use Money\Money;

/**
 * Class Entry
 * @package Genkgo\Camt\Camt053
 */
class Entry
{
    /**
     * @var Statement
     */
    private $statement;
    /**
     * @var Money
     */
    private $amount;
    /**
     * @var DateTimeImmutable
     */
    private $bookingDate;
    /**
     * @var DateTimeImmutable
     */
    private $valueDate;
    /**
     * @var EntryTransactionDetail[]
     */
    private $transactionDetails = [];
    /**
     * @var bool
     */
    private $reversalIndicator = false;
    /**
     * @var string
     */
    private $reference;
    /**
     * @var string
     */
    private $accountServicerReference;
    /**
     * @var int
     */
    private $index;
        /**
     * @var string
     */
    private $cdtDbtInd;
    /**
     * @var string
     */
    private $batchPaymentId;

    /**
     * @param Statement $statement
     * @param int $index
     * @param Money $amount
     * @param DateTimeImmutable $bookingDate
     * @param DateTimeImmutable $valueDate
     */
    public function __construct(Statement $statement, $index, $cdtDbtInd, Money $amount, DateTimeImmutable $bookingDate, DateTimeImmutable $valueDate)
    {
        $this->statement = $statement;
        $this->index = $index;
        $this->amount = $amount;
        $this->bookingDate = $bookingDate;
        $this->valueDate = $valueDate;
        $this->cdtDbtInd = $cdtDbtInd;
    }

    /**
     * @return Statement
     */
    public function getStatement()
    {
        return $this->statement;
    }

    /**
     * @return Money
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getValueDate()
    {
        return $this->valueDate;
    }

    /**
     * @param EntryTransactionDetail $detail
     */
    public function addTransactionDetail(EntryTransactionDetail $detail)
    {
        $this->transactionDetails[] = $detail;
    }

    /**
     * @return EntryTransactionDetail[]
     */
    public function getTransactionDetails()
    {
        return $this->transactionDetails;
    }

    /**
     * @return EntryTransactionDetail
     */
    public function getTransactionDetail()
    {
        if (isset($this->transactionDetails[0])) {
            return $this->transactionDetails[0];
        } else {
            throw new BadMethodCallException('There are no transaction details at all for this entry');
        }
    }

    /**
     * @return bool
     */
    public function getReversalIndicator ()
    {
        return $this->reversalIndicator;
    }

    /**
     * @param boolean $reversalIndicator
     */
    public function setReversalIndicator($reversalIndicator)
    {
        $this->reversalIndicator = $reversalIndicator;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Unique reference as assigned by the account servicing institution to unambiguously identify the entry.
     * @return string
     */
    public function getAccountServicerReference()
    {
        return $this->accountServicerReference;
    }

    /**
     * @param string $accountServicerReference
     */
    public function setAccountServicerReference($accountServicerReference)
    {
        $this->accountServicerReference = $accountServicerReference;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param string $batchPaymentId
     */
    public function setBatchPaymentId($batchPaymentId)
    {
        $this->batchPaymentId = trim($batchPaymentId);
    }

    /**
     * @return string
     */
    public function getBatchPaymentId()
    {
        return $this->batchPaymentId;
    }
    
    /**
     * @return string
     */
    public function getCdtDbtInd()
    {
        return $this->cdtDbtInd;
    }

    /**
     * @param string $cdtDbtInd
     */
    public function setCdtDbtInd($cdtDbtInd)
    {
        $this->cdtDbtInd = $cdtDbtInd;
    }
}
