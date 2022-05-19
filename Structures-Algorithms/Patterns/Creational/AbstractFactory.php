<?php

interface IndustryFactory
{
    public function createLightIndustry(): LightIndustry;
    public function createHeavyIndustry(): HeavyIndustry;
}

interface LightIndustry
{
    public function produce(array $data): string;
}

interface HeavyIndustry
{
    public function produce(array $data): string;
}

class BrasilLightIndustry implements LightIndustry
{
    public function produce(array $data): string
    {
        return implode(',', $data) . "\n";
    }
}

class BrasilHeavyIndustry implements HeavyIndustry
{
    public function produce(array $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR);
    }
}

class BrasilIndustryFactory implements IndustryFactory
{
    public function createLightIndustry(): LightIndustry
    {
        return new BrasilLightIndustry();
    }

    public function createHeavyIndustry(): HeavyIndustry
    {
        return new BrasilHeavyIndustry();
    }
}

class ArgentinaLightIndustry implements LightIndustry
{
    public function produce(array $data): string
    {
        return implode(',', $data) . "\r\n";
    }
}

class ArgentinaHeavyIndustry implements HeavyIndustry
{
    public function produce(array $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
    }
}


class ArgentinaIndustryFactory implements IndustryFactory
{
    public function createLightIndustry(): LightIndustry
    {
        return new ArgentinaLightIndustry();
    }

    public function createHeavyIndustry(): HeavyIndustry
    {
        return new ArgentinaHeavyIndustry();
    }
}

//class Client
//{
//    private CalcTax $myCalcTax;
//    private CalcFreight $myCalcFreight;
//    private AddressVer $myAddressVer;
//
//    public function __construct(AbsractFactory $af)
//    {
//        $this->myCalcTax = $af->makeCalcTax();
//        $this->myCalcFreight = $af->makeCalcFreight();
//        $this->myAddressVer = $af->makeAddressVer();
//    }
//
//    // ...
//}

//abstract class AbstractFactory
//{
//    abstract public function makeCalcTax(): CalcTax;
//    abstract public function makeCalcFreight(): CalcFreight;
//    abstract public function makeAddressVer(): AddressVer;
//    public static function getToUse(string $customerCode): AbstractFactory
//    {
//        if (str_starts_with($customerCode, 'B')) {
//            return new BrasilFactory();
//        } else {
//            return new ArgentinaFactory();
//        }
//        // ...
//    }
//}
//
//class BrasilFactory extends AbtractFactory
//{
//    public function makeCalcTax(): CalcTax
//    {
//        return new BrasilCalcTax();
//    }
//
//    public function makeCalcFreight(): CalcFreight
//    {
//        return new BrasilCalcFreight();
//    }
//
//    public function makeAddressVer(): AddressVer
//    {
//        return new BrasilAddressVer();
//    }
//}
//
//class ArgentinaFactory extends AbtractFactory
//{
//    public function makeCalcTax(): CalcTax
//    {
//        return new ArgentinaCalcTax();
//    }
//
//    public function makeCalcFreight(): CalcFreight
//    {
//        return new ArgentinaCalcFreight();
//    }
//
//    public function makeAddressVer(): AddressVer
//    {
//        return new ArgentinaAddressVer();
//    }
//}

// other example: https://designpatternsphp.readthedocs.io/en/latest/Creational/AbstractFactory/README.html
