<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\COMENTARIOSRepository;

class ComentariosService
{
    private $entityManager;
    private $comentariosRepository;

    public function __construct(EntityManagerInterface $entityManager, COMENTARIOSRepository $comentariosRepository)
    {
        $this->entityManager = $entityManager;
        $this->comentariosRepository = $comentariosRepository;
    }

    public function findAllComentarios()
    {
        try {
            $comentarios = $this->comentariosRepository->findAllComentariossWithRelations();
            return $comentarios;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar los Comentarios con relaciones: ' . $e->getMessage());
        }
    }

    public function findComentarioById(int $id)
    {
        try {
            $comentario = $this->comentariosRepository->findComentariosByIdWithRelations($id);
            return $comentario;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el Comentarios con relaciones por ID: ' . $e->getMessage());
        }
    }
    public function findComentarioByComentario(int $comentarios_id)
    {
        try {
            $comentario = $this->comentariosRepository->findComentariosByComentarios($comentarios_id);
            return $comentario;
        } catch (\Exception $e) {

            throw new \Exception('Error al recuperar el Comentarios con relaciones por Comentario_ID: ' . $e->getMessage());
        }
    }
}
