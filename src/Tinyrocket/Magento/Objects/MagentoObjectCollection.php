<?php namespace Tinyrocket\Magento\Objects;

use Tinyrocket\Magento\Objects\MagentoObject;

/**
 *  Magento API | Connection Exceptions
 *
 *  The MIT License (MIT)
 *  
 *  Copyright (c) 2014 TinyRocket
 *  
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *  
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *  
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 *
 *  @category   MagentoApi
 *  @package    MagentoApi_Objects_MagentoObjectCollection
 *  @author     TinyRocket <michael@tinyrocket.co>
 *  @copyright  2014 TinyRocket
 *
 */
class MagentoObjectCollection {

    /**
     *  @var collection - stores items
     */
    protected $collection;

    /**
     *  @var count - total number of collection items
     */
    protected $count;

    /**
     *  Constructor
     */
    public function __construct()
    {
        $args = func_get_args();
        if (empty($args[0])) {
            $args[0] = array();
        }
        $data = $args[0];

        if ( is_array($data) ) {
            foreach ($data as $item) {
                $object = new MagentoObject($item);
                $this->collection[] = $object;
            }
        }

        $this->count = count($this->collection);
    }

    /**
     *  Get Collection
     *
     *  @return Tinyrocket\Magento\Objects\MagentoObjectCollection
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     *  Get First Item
     *
     *  @return MagentoObject
     */
    public function getFirstItem()
    {
        if ( count($this->collection) ) {
            return current($this->collection);
        }
    }


    /**
     *  Get Count
     *
     *  @return int
     */
    public function getCount()
    {
        return $this->count;
    }

}