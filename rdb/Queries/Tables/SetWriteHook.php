<?php

namespace r\Queries\Tables;

use r\ValuedQuery\ValuedQuery;
use r\ProtocolBuffer\TermTermType;

class SetWriteHook extends ValuedQuery
{
    public function __construct(Table $table, $writeHookFunction)
    {
        $writeHookFunction = $this->nativeToDatumOrFunction($writeHookFunction);
        $this->setPositionalArg(0, $table);
        $this->setPositionalArg(1, $writeHookFunction);
    }

    protected function getTermType()
    {
        return TermTermType::PB_SET_WRITE_HOOK;
    }
}
