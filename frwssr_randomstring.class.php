<?php

/**
 * A field type for generating a random string
 *
 * @package default
 * @author Nils Mielke, FEUERWASSER
 * @version v0.0.1 - 2021-04-28
 */
class PerchFieldType_frwssr_randomstring extends PerchAPI_FieldType
{

    /**
     * Form fields for the edit page
     *
     * @param array $details
     * @return string
     */

    public function render_inputs($details=array())
    {
        $id = $this->Tag->id();
        $value = $this->Form->get($details, $id, $this->Tag->default(), $this->Tag->post_prefix());
        if (!$value || $value == '') {
            $style = $this->Tag->style() ? $this->Tag->style() : 'alphanumeric';
            $case = $this->Tag->case() ? $this->Tag->case() : 'mixed';
            $length = $this->Tag->length() ? $this->Tag->length() : 8;
            $prefix = $this->Tag->prefix() ? filter_var( trim($this->Tag->prefix()), FILTER_SANITIZE_URL) : '';
            $postfix = $this->Tag->postfix() ? filter_var( trim($this->Tag->postfix()), FILTER_SANITIZE_URL) : '';
            $numeric = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 0 ];
            $lowercase = [ 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z' ];
            $uppercase = [ 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z' ];
            switch ($style) {
                case 'alphabetic':
                    $use = $case == 'lowercase' ? $lowercase : ($case == 'uppercase' ? $uppercase : array_merge($lowercase, $uppercase));
                    break;
                case 'numeric':
                    $use = $numeric;
                    break;
                default:
                    $use = array_merge($lowercase, $uppercase, $numeric);
            }
            $combo = [];
            for ($i = 0; $i < ceil($length/2); $i++) {
                $combo = array_merge($combo, $use);
            }
            shuffle($combo);
            $string = implode('', $combo);
            $value = $prefix . substr($string, 0, $length) . $postfix;
        }

        $attributes = $this->Tag->editable() ? '' : 'readonly="readonly"';
        $s = $this->Form->text($this->Tag->input_id(), $value, 'input-simple '.$this->Tag->size('m'), $this->Tag->maxlength(), false, $attributes);

        return $s;
    }

}