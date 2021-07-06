<?php


namespace App\Services;


use App\Exceptions\ItemsNotFoundException;
use App\Exceptions\XmlParseException;
use Illuminate\Http\Response;

/**
 * @property mixed betInfoSumAmount
 */
class XmlService
{

    /**
     * @var int
     */
    protected $betInfoSumAmount = 0;

    /**
     * @return $this
     * @throws XmlParseException
     */
    public function parse()
    {
        $xmlData = xmlParseToArray($this->getXmlContent());
        if ($xmlData === null) {
            throw new XmlParseException('XML_PARSE_ERROR', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        if (!count($xmlData)) {
            throw new ItemsNotFoundException('ITEMS_NOT_FOUND',Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if (empty($xmlData['Param'])) {
            return $this;
        }
        $this->betInfoSumAmount = collect($xmlData['Param']['BetInfo']['BetAmount'])->sum();

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSumAmount()
    {
        return $this->betInfoSumAmount;
    }

    /**
     * @return string
     */
    private function getXmlContent()
    {
        return $example =
            <<<EOF
<?xml version="1.0"?>
<Reply>
    <Header></Header>
    <Param>
        <Method>cGetBetHistory</Method>
        <ErrorCode>0</ErrorCode>
        <MerchantID>1235</MerchantID>
        <MessageID>H110830134512K9n12</MessageID>
        <TotalRecord>1</TotalRecord>
        <ErrorDesc></ErrorDesc>
        <BetInfo>
            <No>2</No>
            <UserID>Player_1313455</UserID>
            <BetTime>08/15/2011 09:37:48</BetTime>
            <BalanceTime>08/15/2011 09:38:31</BalanceTime>
            <ProductID>Baccarat</ProductID>
            <GameInterface>3DView</GameInterface>
            <BetID>a2e3f40b-acae4c58aae8fbd4f755b694</BetID>
            <BetType>Single</BetType>
            <BetAmount>10000</BetAmount>
            <WinLoss>0</WinLoss>
            <BetResult>Loss</BetResult>
            <BetArrays>
                <BetInfo></BetInfo>
            </BetArrays>
            <No>3</No>
            <Bet></Bet>
            <GameID>98</GameID>
            <SubBetType>Player</SubBetType>
            <GameResult>P CLUB A DIAMOND A SPADE 9 ,B DIAMOND 3 CLUB 9 DIAMOND 6</GameResult>
            <WinningBet>Banker</WinningBet>
            <TableID>Baccarat_1</TableID>
            <DealerID>6</DealerID>
            <UserID>Player_1313455</UserID>
            <BetTime>08/15/2011 09:44:48</BetTime>
            <BalanceTime>08/15/2011 09:45:01</BalanceTime>
            <ProductID>Roulette</ProductID>
            <GameInterface></GameInterface>
            <BetID>86791c28-dbb2-4103-a7e8-f1c206bb417d</BetID>
            <BetType>Single</BetType>
            <BetAmount>100000</BetAmount>
            <WinLoss>0</WinLoss>
            <BetResult>Loss</BetResult>
        </BetInfo>
    <Bet></Bet>
    <GameID>R11306251387</GameID>
    <SubBetType>Red</SubBetType>
    <GameResult>32</GameResult>
    <WinningBet>32, Red, 19-36</WinningBet>
    <TableID>Roulette 1</TableID>
    <DealerID>6</DealerID>
</Param>
    </Reply>
EOF;
    }

}
