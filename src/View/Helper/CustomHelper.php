<?php
namespace App\View\Helper;

use App\Utility\Custom;
use Cake\View\Helper;
use Cake\View\View;
use DateTime;

//for use with custom utility

/**
 * Custom helper
 */
class CustomHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = ['Html', 'Url', 'Text'];
    public $customUtil; //for use with custom utility

    // Execute any other additional setup for your helper.
    public function initialize(array $config)
    {
        $this->customUtil = new Custom();
    }

    public function getSku($item)
    {
        return $this->customUtil->getSku($item);
    }
    public function getItemRatingIcons($item)
    {
        //dd($singleRatingsAverages);
        if (!empty($item->average_rating)) {
            //$average = array_sum($singleRatingsAverages) / count($singleRatingsAverages);
            $average = $item->average_rating;
            // dd($average);
            if ($average >= 1 && $average < 2) {
                return '<i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-0"></i>
                <i class="fa fa-star-o"></i>';
            }
            if ($average >= 2 && $average < 3) {
                return '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-0"></i>
                <i class="fa fa-star-o"></i>';
            }
            if ($average >= 3 && $average < 4) {
                return '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-0"></i>
                <i class="fa fa-star-o"></i>';
            }
            if ($average >= 4 && $average < 4.5) {
                return '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>';
            }
            if ($average >= 4.5) {
                return '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>';
            }

        }

        return '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>';

    }

    public function getShippingTotal($delivery_option, $user_address, $cart)
    {
        return $this->customUtil->getShippingTotal($delivery_option, $user_address, $cart);
    }

    public function getOrderTotal($order_snapshot, $pre_order_array = null)
    {
        return $this->customUtil->getOrderTotal($order_snapshot, $pre_order_array);
    }
    public function getCartTotal($sales)
    {
        return $this->customUtil->getCartTotal($sales);
    }
    public function getVoucherAmount($cartTotal, $voucher = null)
    {
        return $this->customUtil->getVoucherAmount($cartTotal, $voucher);
    }
    public function getFilterUrl($key, $value = null, $action, $catslug = null)
    {
        return $this->Url->build(['controller' => 'shop', 'action' => 'index',
            !empty($this->request->getParam('pass')[0]) ? $this->request->getParam('pass')[0] : (!empty($catslug) ? $catslug : ''),
            !empty($this->request->getParam('pass')[1]) ? $this->request->getParam('pass')[1] : '',
            '?' => $this->$action($key, $value),
        ]);
    }

    public function getUserRolesInWord($roles)
    {
        $word = '';
        if (!empty($roles)) {
            foreach ($roles as $role) {
                if (!empty($this->_View->get('the_mace_role'))) {
                    if ($role->id != $this->_View->get('the_mace_role')) {
                        $word .= ucfirst($role->name) . ", ";
                    }
                } else {
                    $word .= ucfirst($role->name) . ", ";
                }

            }
            return $this->str_lreplace(",", " and", $this->str_lreplace(",", ".", $word));
            //return '<div class="d-flex p-2">' . $this->str_lreplace(",", ".", $word) . '</div>';

        }
        return '';
    }

    public function getRadioOptions($optionsArray)
    {
        $options = [];
        if (!empty($optionsArray)) {
            foreach ($optionsArray as $option) {
                $options[] = [
                    'value' => $option->id,
                    'text' => ucwords($option->name),
                    'description' => $this->Text->autoParagraph(h($option->description)),
                    //'description' => $this->Text->autoParagraph(h($option->description)),
                    //'templateVars'=>['description' => $this->Text->autoParagraph(h($option->description))]
                ];
            }
        }

        return $options;
    }

    public function selectSelected($queryValue)
    {
        $query = $this->request->getQuery();
        if (isset($query['sort']) && $query['sort'] == $queryValue) {
            return 'selected="selected"';
        }
        return '';

    }
    public function checkChecked($queryKey)
    {
        $query = $this->request->getQuery();
        if (isset($query[$queryKey])) {
            return 'checked="checked"';
        }
        return '';

    }
    public function queryHasKey($key = null)
    {
        $query = $this->request->getQuery();
        if (isset($query[$key])) {
            return true;
        }
        return false;
    }
    public function addQueryKey($key = null, $value = null)
    {
        $query = $this->request->getQuery();
        if (!empty($key) && !empty($value)) {
            $query[$key] = $value;
        }

        return $query;
    }
    public function removeQueryKey($key = null)
    {
        $query = $this->request->getQuery();
        unset($query[$key]);
        return $query;
    }
    public function getNotificationBackground($notification_type_id)
    {
        if ($notification_type_id == 1) { //info
            return 'bg-info';
        }
        if ($notification_type_id == 2) { //success
            return 'bg-green';
        }
        if ($notification_type_id == 3) { //warning
            return 'bg-orange';
        }
        if ($notification_type_id == 4) { //error
            return 'bg-red';
        }

        return 'bg-info';
    }
    public function getNotificationIcon($notification_type_id)
    {
        if ($notification_type_id == 1) { //info
            return '<i class="fa fa-info-circle"></i>';
        }
        if ($notification_type_id == 2) { //success
            return '<i class="fa fa-check"></i>';

        }
        if ($notification_type_id == 3) { //warning
            return '<i class="fa fa-exclamation-triangle"></i>';

        }
        if ($notification_type_id == 4) { //error
            return '<i class="fa fa-exclamation-triangle"></i>';
        }

        return '<i class="fa fa-info-circle"></i>';

    }

    public function getItemStock($item, $fake_value = true)
    {
        return $this->customUtil->getItemStock($item, $fake_value);
    }
    public function getPromoText($string)
    {
        return $this->customUtil->getPromoText($string);
    }

    public function removeAllWhiteSpaces($string)
    {
        return $this->customUtil->removeAllWhiteSpaces($string);
    }

    public function randomString($length = 6)
    {
        return $this->customUtil->randomString($length);
    }
    public function getNotificationIcon2($notification_type_id)
    {

        // return '<i class="ft-bell info float-left d-block font-large-1 mt-1 mr-2"></i>';
        if ($notification_type_id == 1) { //info
            return '<i class="fa fa-info-circle info float-left d-block font-large-1 mt-1 mr-2"></i>';
        }
        if ($notification_type_id == 2) { //success
            return '<i class="fa fa-check success float-left d-block font-large-1 mt-1 mr-2"></i>';

        }
        if ($notification_type_id == 3) { //warning
            return '<i class="fa fa-exclamation-triangle warning float-left d-block font-large-1 mt-1 mr-2"></i>';

        }
        if ($notification_type_id == 4) { //error
            return '<i class="fa fa-exclamation-triangle danger float-left d-block font-large-1 mt-1 mr-2"></i>';
        }

        return '<i class="fa fa-info-circle"></i>';

    }

    public function paginatorTemplatesFrontend()
    {
        return [
            // 'number' => '<em><a href="{{url}}">{{text}}</a></em>',
            'number' => '<li class="page-item"><a class="" href="{{url}}">{{text}}</a></li>',
            'current' => '<li class="page-item active"><a class="" href="">{{text}}</a></li>',

            //'nextActive' => '<li><a rel="next" href="{{url}}">{{text}}</a></li>',
            'nextActive' => '<li class="page-item"><a class="" aria-label="Next" href="{{url}}"><i class="fa fa-angle-right"></i></a></li>',
            'nextDisabled' => '<li class="page-item disabled"><a class="" href="" onclick="return false;"><i class="fa fa-angle-right"></i></a></li>',
            // 'prevActive' => '<li class="prev page-item"><a class="" rel="prev" href="{{url}}">{{text}}</a></li>',
            'prevActive' => '<li class="page-item"><a class="" aria-label="Previous" href="{{url}}"><i class="fa fa-angle-left"></i></a></li>',
            'prevDisabled' => '<li class="page-item disabled"><a class="" href="" onclick="return false;"><i class="fa fa-angle-left"></i></a></li>',
            'counterRange' => '{{start}} - {{end}} of {{count}}',
            'counterPages' => '{{page}} of {{pages}}',
            'color' => '{{page}} of {{pages}}',
            //'first' => '<li><a href="{{url}}">{{text}}</a></li>',
            'first' => '<li class="page-item"><a class="" href="{{url}}"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>',
            //'last' => '<li class="last page-item"><a class="" href="{{url}}">{{text}}</a></li>',
            'last' => '<li class="page-item"><a class="" href="{{url}}"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>',

            'ellipsis' => '<li class="ellipsis">...</li>',
            'sort' => '<a href="{{url}}">{{text}}</a>',
            'sortAsc' => '<a class="asc" href="{{url}}">{{text}}</a>',
            'sortDesc' => '<a class="desc" href="{{url}}">{{text}}</a>',
            'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
            'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',
        ];
    }

    public function paginatorTemplates()
    {
        return [
            // 'number' => '<em><a href="{{url}}">{{text}}</a></em>',
            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current' => '<li class="page-item active"><a class="page-link" href="">{{text}}</a></li>',

            //'nextActive' => '<li><a rel="next" href="{{url}}">{{text}}</a></li>',
            'nextActive' => '<li class="page-item"><a class="page-link" aria-label="Next" href="{{url}}"><i class="fa fa-angle-right"></i></a></li>',
            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="" onclick="return false;"><i class="fa fa-angle-right"></i></a></li>',
            // 'prevActive' => '<li class="prev page-item"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
            'prevActive' => '<li class="page-item"><a class="page-link" aria-label="Previous" href="{{url}}"><i class="fa fa-angle-left"></i></a></li>',
            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="" onclick="return false;"><i class="fa fa-angle-left"></i></a></li>',
            'counterRange' => '{{start}} - {{end}} of {{count}}',
            'counterPages' => '{{page}} of {{pages}}',
            'color' => '{{page}} of {{pages}}',
            //'first' => '<li><a href="{{url}}">{{text}}</a></li>',
            'first' => '<li class="page-item"><a class="page-link" href="{{url}}"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>',
            //'last' => '<li class="last page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'last' => '<li class="page-item"><a class="page-link" href="{{url}}"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>',

            'ellipsis' => '<li class="ellipsis">...</li>',
            'sort' => '<a href="{{url}}">{{text}}</a>',
            'sortAsc' => '<a class="asc" href="{{url}}">{{text}}</a>',
            'sortDesc' => '<a class="desc" href="{{url}}">{{text}}</a>',
            'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
            'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',
        ];
    }

    public function getItemAvailability($item)
    {

        $available_number = $this->getItemStock($item);
        if (empty($available_number)) {
            return '<span class="out-of-stock">
                <i class="fas fa-times-circle"></i> OUT Of STOCK</span>';
        } elseif ($available_number > 1) {
            return '<p>
                <span class="in-stock">
                    <i class="ion-checkmark-round"></i> IN STOCK</span>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;
                   ' . number_format($available_number) . ' Remaining</span>
            </p>';
        } else {
            return '<p>
                <span class="in-stock">
                    <i class="ion-checkmark-round"></i> IN STOCK</span>
            </p>';
        }

    }

    public function newItemSticker($item)
    {
        //dd($item->created);
        /*
        See also: https: //book.cakephp.org/3.0/en/core-libraries/time.html

        echo $time->isYesterday();
        echo $time->isThisWeek();
        echo $time->isThisMonth();
        echo $time->isThisYear();

        // Within 2 days.
        echo $time->isWithinNext(2);

        // Within 2 next weeks.
        echo $time->isWithinNext('2 weeks');

        // Within past 2 days.
        echo $time->wasWithinLast(2);

        // Within past 2 weeks.
        echo $time->wasWithinLast('2 weeks');

         */
        if ($item->created->wasWithinLast("10 days")) {
            return '<span class="sticker-new">new</span>';
        }
    }

    public function replaceIconWithDiv($icon)
    {
        $word1 = str_ireplace('<i', "<div", $icon);
        $word2 = str_ireplace('</i', "</div", $word1);
        return $word2;
    }
    public function getAgeFromDate($date)
    {

        //dd(date("D M Y", strtotime($date)));
        //dd(strtotime($date));
        //return date("D M Y") - date("D M Y", strtotime($date));

        //$dateOfBirth = "17-10-1985";

        if (!empty($date)) {
            $today = date("D M Y");
            $diff = date_diff(date_create($date), date_create($today));
            return $diff->format('%y');
        }
        return "N/A";

    }

    //Not really in use but another variation of the above function
    public function getAge($year, $month, $day)
    {
        $date = "$year-$month-$day";
        if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
            $dob = new DateTime($date);
            $now = new DateTime();
            return $now->diff($dob)->y;
        }
        $difference = time() - strtotime($date);
        return floor($difference / 31556926);
    }

    //works with bootstrap file input plugin - http: //plugins.krajee.com/file-input
    public function checkImagePreview($image, $folder = null)
    {
        if (empty($image)) {
            return '';
        }

        return "data-initial-preview=\"<img src='" . $this->getDp($image, $folder) . "' class='file-preview-image' title='Image' width='300' height='150' >\"";

    }

    public function getDp($image_url, $folder = null, $size = null)
    {
        return $this->customUtil->getDp($image_url, $folder, $size);

    }

    public function resetSubcatsByItemCount($category)
    {
        $subcategory_item_counts = [];
        if (!empty($category->subcategories)) {
            foreach ($category->subcategories as $subcategory) {
                $subcategory_item_counts[$subcategory->id] = count($subcategory->items);
            }
        }
        // rsort($subcategory_item_counts);
        // asort($subcategory_item_counts);
        arsort($subcategory_item_counts);
        $subcats = [];

        if (!empty($subcategory_item_counts)) {
            foreach ($subcategory_item_counts as $key => $value) {
                foreach ($category->subcategories as $subcategory) {
                    if ($subcategory->id == $key) {
                        $subcats[] = $subcategory;
                    }
                }
            }
        }
        // dd(count($subcats[0]->items));
        return $subcats;
    }

    public function categoryHasSubcategoryAndItems($category)
    {

        $subcatreset = $this->resetSubcatsByItemCount($category);

        //dd($subcatreset[0]->items);
        if (!empty($subcatreset[0]->items) && !empty($subcatreset[1]->items) && !empty($subcatreset[2]->items) && !empty($subcatreset[3]->items)) {

            $active_items0 = 0;
            $active_items1 = 0;
            $active_items2 = 0;
            $active_items3 = 0;

            foreach ($subcatreset[0]->items as $item) {
                if ($item->active) {
                    $active_items0++;
                }
            }
            foreach ($subcatreset[1]->items as $item) {
                if ($item->active) {
                    $active_items1++;
                }
            }
            foreach ($subcatreset[2]->items as $item) {
                if ($item->active) {
                    $active_items2++;
                }
            }
            foreach ($subcatreset[3]->items as $item) {
                if ($item->active) {
                    $active_items3++;
                }
            }
            if ($active_items0 > 2 && $active_items1 > 2 && $active_items2 > 2 && $active_items3 > 2) {
                return true;
            }

        }
        /* if (!empty($category) && !empty($category->subcategories)) {
        foreach ($category->subcategories as $subcategory) {
        if (!empty($subcategory->items)) {
        // dd($subcategory);
        return true;
        }
        }
        } */
        return false;
    }

    public function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return $length === 0 ||
            (substr($haystack, -$length) === $needle);
    }

    public function singularise($word, $count)
    {
        if ($count < 2) {

            if ($this->endsWith($word, "ies")) {
                $word = $this->str_lreplace("ies", "y", $word);

            } elseif ($this->endsWith($word, "s")) {
                $word = $this->str_lreplace("s", "", $word);
            }

        }
        return $word;
    }

    public function sumQuantity($array)
    {
        $sum = 0;
        if (!empty($array)) {
            foreach ($array as $array_item) {
                $sum += $array_item->quantity;
            }
        }
        return $sum;
    }

    //find and replace last occurence in string
    public function showArrayItemsAsString($array)
    {

        $string = "";

        if (!empty($array)) {
            //var_dump($user->categories);
            foreach ($array as $array_item) {
                $string .= $array_item->name . ", ";
            }
            //echo $this->str_lreplace(",", "", $string);
        } else {
            return "N/A";
        }

        return $this->str_lreplace(",", "", $string);
    }
    public function str_lreplace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);
        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }
        return $subject;
    }

    public function userHasRole($user_roles, $action_roles)
    {
        return $this->customUtil->userHasRole($user_roles, $action_roles);
    }

    public function niceShortestDate($dob)
    {
        if (!empty($dob)) {
            $test = new DateTime($dob);
            return date_format($test, 'l jS, M');
        }
        return "N/A";
    }
    public function niceShorterDate($dob)
    {
        if (!empty($dob)) {
            $test = new DateTime($dob);
            return date_format($test, 'l jS, M Y');
        }
        return "N/A";
    }

    public function niceDate($dob)
    {
        if (!empty($dob)) {
            $test = new DateTime($dob);
            return date_format($test, 'l jS \of F Y');
        }
        return "N/A";
    }

    public function niceDateNoYear($dob)
    {
        if (!empty($dob)) {
            $test = new DateTime($dob);
            return date_format($test, 'jS \of F');
        }
        return "N/A";
    }

}
