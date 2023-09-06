<?php

namespace forth;

class PhysicalDistributionBase
{
    public function ship(Baggage $baggage): Baggage
    {

    }

    public function Receive(Baggage $baggage): void
    {

    }

    public function transport(PhysicalDistributionBase $to, Baggage $baggage): void
    {
        $shippedBaggage = new Ship($baggage);
        $to->Receive($shippedBaggage);

        // 例えば配送の記録は必要だろうか
    }
}
