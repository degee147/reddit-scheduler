<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string|null $flair
 * @property \Cake\I18n\FrozenTime $schedule
 * @property int|null $account_id
 * @property int|null $subreddit_id
 * @property bool|null $success
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Subreddit $subreddit
 */
class Post extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'url' => true,
        'flair' => true,
        'schedule' => true,
        'account_id' => true,
        'subreddit_id' => true,
        'success' => true,
        'created' => true,
        'modified' => true,
        'account' => true,
        'subreddit' => true
    ];
}
