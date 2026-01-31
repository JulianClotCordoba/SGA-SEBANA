<?php
namespace App\Modules\Afiliados\Models;

use App\Core\ModelBase;
use PDO;

class Afiliados extends ModelBase {
    
    protected $table = 'afiliados';

    public function existeCedula($cedula, $idExcluir = null) {
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE cedula = :cedula";
        $params = ['cedula' => $cedula];

        if ($idExcluir) {
            $sql .= " AND id != :id";
            $params['id'] = $idExcluir;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }

    /**
     * ACTUALIZADO (HU-AF-03): Corrección para búsqueda múltiple
     */
    public function getAll($filtros = []) {
        // Iniciamos la consulta base
        $sql = "SELECT * FROM {$this->table} WHERE 1=1";
        $params = [];

        // Filtro 1: Búsqueda General
        // CORRECCIÓN: Usamos :b1, :b2, :b3 para evitar error de "Invalid parameter number"
        if (!empty($filtros['busqueda'])) {
            $sql .= " AND (nombre_completo LIKE :b1 OR cedula LIKE :b2 OR numero_empleado LIKE :b3)";
            $termino = "%" . $filtros['busqueda'] . "%";
            $params['b1'] = $termino;
            $params['b2'] = $termino;
            $params['b3'] = $termino;
        }

        // Filtro 2: Estado (Activo / Inactivo)
        if (!empty($filtros['estado'])) {
            $sql .= " AND estado = :estado";
            $params['estado'] = $filtros['estado'];
        }

        // Ordenamiento por defecto
        $sql .= " ORDER BY created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET 
                nombre_completo = :nombre_completo,
                cedula = :cedula,
                numero_empleado = :numero_empleado,
                genero = :genero,
                fecha_nacimiento = :fecha_nacimiento,
                oficina_nombre = :oficina_nombre,
                oficina_numero = :oficina_numero,
                categoria = :categoria,
                email_institucional = :email_institucional,
                celular_personal = :celular_personal,
                updated_at = NOW()
                WHERE id = :id";
        
        $data['id'] = $id;
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function toggleStatus($id) {
        $current = $this->getById($id);
        if (!$current) return false;

        $nuevoEstado = ($current['estado'] === 'activo') ? 'inactivo' : 'activo';

        $stmt = $this->db->prepare("UPDATE {$this->table} SET estado = :estado WHERE id = :id");
        return $stmt->execute(['estado' => $nuevoEstado, 'id' => $id]);
    }
}