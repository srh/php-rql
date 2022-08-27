<?php

namespace r\Queries\Tables;

use r\ValuedQuery\ValuedQuery;
use r\ProtocolBuffer\TermTermType;

class GetWriteHook extends ValuedQuery
{
    public function __construct(Table $table)
    {
        $this->setPositionalArg(0, $table);
    }

    protected function getTermType()
    {
        return TermTermType::PB_GET_WRITE_HOOK;
    }
}
