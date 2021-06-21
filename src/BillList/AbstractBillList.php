<?php
/**
 * Abstract Bill List List
 *
 * @package    Intacct
 * @subpackage Accounts Payable
 * @since      2021 Jun
 */

namespace Intacct\BillList;

use Intacct\Functions\AbstractFunction;
use Intacct\Functions\Common\GetList\FilterInterface;

abstract class AbstractBillList extends AbstractFunction
{

    /** @var string[] */
    protected $fields = ['*'];

    /** @var FilterInterface[] */
    protected $filters = [];

    /**
     * Add Field (will automatically remove duplicates)
     *
     * @param string $fieldName
     */
    public function addField(string $fieldName)
    {
        if ($this->fields === ['*']) {
            $this->fields = [];
        }
        $this->fields[] = $fieldName;

        $this->fields = array_unique($this->fields);
    }

    /**
     * Add Filter.
     *
     * @param FilterInterface $filter
     */
    public function addFilter(FilterInterface $filter)
    {
        $this->filters[] = $filter;
    }

    /**
     * Get Fields.
     *
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }


    public function getFilters()
    {
        return $this->filters;
    }
}
