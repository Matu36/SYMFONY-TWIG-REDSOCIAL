<?php

namespace App\Entity;

use App\Repository\COMENTARIOSRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=COMENTARIOSRepository::class)
 * @ORM\Table(name="comentarios")
 */
class COMENTARIOS
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $type_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ref_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenido;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $comentarios_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

     /**
     * @ORM\ManyToOne(targetEntity=USUARIOS::class)
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    
     */
    private $usuariosComentarios;

     /**
     * @ORM\ManyToOne(targetEntity=COMENTARIOS::class, inversedBy="respuestas")
     * @ORM\JoinColumn(name="comentarios_id", referencedColumnName="id")
     */
    private $comentariosComentarios;

/**
 * @ORM\OneToMany(targetEntity=COMENTARIOS::class, mappedBy="comentariosComentarios")
*/
  private $respuestas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeId(): ?int
    {
        return $this->type_id;
    }

    public function setTypeId(?int $type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }

    public function getRefId(): ?int
    {
        return $this->ref_id;
    }

    public function setRefId(?int $ref_id): self
    {
        $this->ref_id = $ref_id;

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

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(?string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getComentariosId(): ?int
    {
        return $this->comentarios_id;
    }

    public function setComentariosId(?int $comentarios_id): self
    {
        $this->comentarios_id = $comentarios_id;

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

    public function getUsuariosComentarios(): ?USUARIOS
    {
        return $this->usuariosComentarios;
    }

    public function setUsuariosComentarios(?USUARIOS $usuariosComentarios): self
    {
        $this->usuariosComentarios = $usuariosComentarios;
        return $this;
    }

    public function getComentariosComentarios(): ?COMENTARIOS
    {
        return $this->comentariosComentarios;
    }

    public function setComentarios(?COMENTARIOS $comentariosComentarios): self
    {
        $this->comentariosComentarios = $comentariosComentarios;
        return $this;
    }

    public function getRespuestas()
{
    return $this->respuestas;
}

public function setRespuestas($respuestas)
{
    $this->respuestas = $respuestas;
}
}


// Sirve para guardar los comentarios de los posts, imágenes, etc.

// id: Llave primaria
// type_id: Tipo, si es para posts, imágenes, albums etc.
// ref_id: El id del del post, imagen o album según el caso.
// user_id: El id del usuario que crea el comentario
// content: Contenido del comentario
// comment_id: Si es un comentario de otro comentario, se guarda el id del comentario superior
// created_at: Fecha de creación