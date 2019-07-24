<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/** 
 * A addres
 * 
 * @category   	Entity
 *
 * @author     	Ruben van der Linde <ruben@conduction.nl>
 * @license    	EUPL 1.2 https://opensource.org/licenses/EUPL-1.2 *
 * @version    	1.0
 *
 * @link   		http//:www.conduction.nl
 * @package		Common Ground Component
 * @subpackage  Adressen
 * 
 * 
 * @ApiResource(
 *     collectionOperations={
 *          "get"={          
 *      		"path"="/adressen",
 *              "method"="GET",
 *              "swagger_context" = {
 *                  "parameters" = {
 *                      {
 *                          "name" = "huisnummer",
 *                          "in" = "query",
 *                          "description" = "The number of the addres you are searching for",
 *                          "required" = "true",
 *                          "type" : "integer"
 *                      }, *                     
 *                      {
 *                          "name" = "postcode",
 *                          "in" = "query",
 *                          "description" = "The zip or postalcode of  the addres you are searching for",
 *                          "required" = "true",
 *                          "type" : "string"
 *                      }
 *                  }
 *               }
 *          }
 *     },
 *     itemOperations={
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\AdresRepository")
 * @ApiFilter(NumericFilter::class, properties={"test"})
 */
class Adres
{
	/**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string")
	 * 	 
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The UUID of the nummeraanduiding asociated with this addres",
     *             "type"="string",
     *             "example"="0363200000218908"
     *         }
     *     }
     * )
	 */
	private $id;
	
    /**
     * @param string $type The type of addres.
     *     
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The type of addres",
     *             "type"="string",
     *             "enum"={"verblijfsobject", "ligplaats", "standplaats"},
     *             "example"="verblijfsobject"
     *         }
     *     }
     * )
     */
    private $type;

    /**
     * @param ingeteger $oppervlakte The surface area in square meters (in case of verblijfsobject)
     *     
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The surface area in square meters (in case of verblijfsobject)",
     *             "type"="ingeteger",
     *             "example"="22214"
     *         }
     *     }
     * )
     */
    private $oppervlakte;

    /**
     * @param string $status The last know status of this addres.
     *     
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The last know status of this addres",
     *             "type"="string",
     *             "example"="VerblijfsobjectInGebruik"
     *         }
     *     }
     * )
     */
    private $status;

    /**
     * @param integer $huisnummer The housenumber of this addres.
     *     
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The housenumber of this addres",
     *             "type"="integer",
     *             "example"=147
     *         }
     *     }
     * )
     */
    private $huisnummer;

    /**
     * @param string $huisnummerToevoeging The sufix to the housenumber of this address.
     * 
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The sufix to the housenumber of this addres",
     *             "type"="string",
     *             "example"="huis"
     *         }
     *     }
     * )
     */
    private $huisnummerToevoeging;

    /**
     * @param string $straat The streetname for this addres.
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The streetname for this addres",
     *             "type"="string",
     *             "example"="Nieuwezijds Voorburgwal"
     *         }
     *     }
     * )
     */
    private $straat; 

    /**
     * @param string $postcode The zip or postalcode of this addres.
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The zip or postalcode of this addres",
     *             "type"="string",
     *             "example"="1012RJ"
     *         }
     *     }
     * )
     */
    private $postcode;

     /**
     * @param string $woonplaats The city or locality to witch this adres belongs.
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The city or locality to witch this adres belongs",
     *             "type"="string",
     *             "example"="Amsterdam"
     *         }
     *     }
     * )
     */
    private $woonplaats;

    /**
     * @param array $links A name property - this description will be available in the API documentation too.
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
 	 *         	   "description" = "The zip or postalcode of  the addres you are searching for",
     *             "type"="array",
     *             "example"="[]"
     *         }
     *     }
     * )
     */
    private $links = [];
    
    public function getId(): ?string
    {
    	return $this->id;
    }
    
    public function setId(?string $id): self
    {
    	$this->id= $id;
    	
    	return $this;
    }
    
    public function getType(): ?string
    {
    	return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getOppervlakte(): ?int
    {
        return $this->oppervlakte;
    }

    public function setOppervlakte(?int $oppervlakte): self
    {
        $this->oppervlakte = $oppervlakte;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getHuisnummer(): ?int
    {
        return $this->huisnummer;
    }

    public function setHuisnummer(?int $huisnummer): self
    {
        $this->huisnummer = $huisnummer;

        return $this;
    }

    public function getHuisnummerToevoeging(): ?string
    {
        return $this->huisnummerToevoeging;
    }

    public function setHuisnummerToevoeging(?string $huisnummerToevoeging): self
    {
        $this->huisnummerToevoeging = $huisnummerToevoeging;

        return $this;
    }

    public function getStraat(): ?string
    {
        return $this->straat;
    }

    public function setStraat(?string $straat): self
    {
        $this->straat = $straat;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(?string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    public function getLinks(): ?array
    {
        return $this->links;
    }

    public function setLinks(?array $_links): self
    {
        $this->links = $_links;

        return $this;
    }
}
