<?php

namespace NotaFiscalSP\Builders\AsyncNF;

use NotaFiscalSP\Builders\NfAbstract;
use NotaFiscalSP\Constants\Methods\NfAsyncMethods;
use NotaFiscalSP\Constants\Requests\HeaderEnum;
use NotaFiscalSP\Constants\Requests\SimpleFieldsEnum;
use NotaFiscalSP\Entities\BaseInformation;
use NotaFiscalSP\Helpers\General;
use NotaFiscalSP\Helpers\Xml;

class  PedidoConsultaGuia extends NfAbstract
{
    public function makeXmlRequest(BaseInformation $information, $params = null)
    {
        $request = [];
        $request[HeaderEnum::CPFCNPJ_SENDER] = $this->getDocument($information);
        $request[SimpleFieldsEnum::IM_PROVIDER] = $information->getIm();
        $request[SimpleFieldsEnum::INCIDENCE] = General::getKey($params, SimpleFieldsEnum::INCIDENCE);
        $request[SimpleFieldsEnum::SITUATION] = General::getKey($params, SimpleFieldsEnum::SITUATION);

        return Xml::makeRequestXML(NfAsyncMethods::CONSULTA_GUIA, $request);
    }
}