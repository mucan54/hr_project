<?php

class Order
{
    /** @var OrderItem[] */
    private $orderItems;

    /** @var int */
    private $countItems;

    /** @var float */
    private $maxPrice;

    /** @var float */
    private $sumPrice;

    public function __construct(array $orderItems=[])
    {
        $this->orderItems = $orderItems;
        $this->calculateTotals();
    }

    /**
     * @return OrderItem[]
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @param OrderItem $orderItem
     */
    public function addOrderItem(OrderItem $orderItem): void
    {
        $this->orderItems[] = $orderItem;
        $this->calculateTotals();
    }

    public function removeOrderItem(OrderItem $orderItem): void
    {
        if (($key = array_search($orderItem, $this->orderItems)) !== false) {
            unset($this->orderItems[$key]);
        }
        $this->calculateTotals();
    }

    /**
     * @return int
     */
    public function getCountItems(): int
    {
        return $this->countItems;
    }

    /**
     * @return int
     */
    public function getMaxPrice(): int
    {
        return $this->maxPrice;
    }

    /**
     * @return int
     */
    public function getSumPrice(): int
    {
        return $this->sumPrice;
    }

    private function calculateTotals(): void
    {
        $this->countItems = count($this->orderItems);
        $this->sumPrice = 0.0;
        $this->maxPrice = 0.0;
        foreach ($this->orderItems as $curOrderItem) {
            $this->sumPrice += $curOrderItem->getPrice();
            if ($curOrderItem->getPrice() > $this->maxPrice) {
                $this->maxPrice = $curOrderItem->getPrice();
            }
        }
    }
}