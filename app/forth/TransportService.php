<?php

namespace forth;

class TransportService
{
    public function transport(PhysicalDistributionBase $to, Baggage $baggage): void
    {
        $shippedBaggage = new Ship($baggage);
        $to->Receive($shippedBaggage);

        // 例えば配送の記録を行う
    }
}
