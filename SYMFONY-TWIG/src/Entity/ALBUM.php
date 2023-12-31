<?php

namespace App\Entity;

use App\Repository\ALBUMRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ALBUMRepository::class)
 * @ORM\Table(name="album")
 */
class ALBUM
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $contenido;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usuariosAlbum;

    /**
     * @ORM\ManyToOne(targetEntity=LABEL::class)
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    private $levelAlbum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(?string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getLevelId(): ?int
    {
        return $this->level_id;
    }

    public function setLevelId(?int $level_id): self
    {
        $this->level_id = $level_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
    public function getUsuariosAlbum(): ?USUARIOS
    {
        return $this->usuariosAlbum;
    }

    public function setUsuariosAlbum(?USUARIOS $usuariosAlbum): self
    {
        $this->usuariosAlbum = $usuariosAlbum;
        return $this;
    }

    public function getLevelAlbum(): ?LABEL
    {
        return $this->levelAlbum;
    }

    public function setLevelAlbum(?LABEL $levelAlbum): self
    {
        $this->levelAlbum = $levelAlbum;
        return $this;
    }
}


// Sirve para crear albums de imagenes.

// id: Llave primaria
// title: Titulo del album
// content: Descripción del album
// user_id: Id del usuario propietario del album
// level_id: Nivel de permiso o distribución del album
// created_at: Fecha de creación