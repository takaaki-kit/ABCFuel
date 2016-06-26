<?php

class validation extends Fuel\Core\Validation
{
    public function _validation_uniqueness($value, $options = array())
    {
        if (empty($value)) {
            return true;
        }

        $table = $this->callables()[0]->table();
        $field = $this->active_field()->name;

        # TODO: 論理削除
        $result = DB::select(DB::expr('COUNT(*) AS count'))
            ->from($table)->where($field, $value)->execute();

        if ($result->current()['count']) {
            return false;
        } else {
            return true;
        }
    }
}
