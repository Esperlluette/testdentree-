<?php

namespace App\Entity;

use App\Repository\ErrorCodeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ErrorCodeRepository::class)]
class ErrorCode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $http_code = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $tag = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $message = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHttpCode(): ?string
    {
        return $this->http_code;
    }

    public function setHttpCode(string $http_code): static
    {
        $this->http_code = $http_code;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

}
