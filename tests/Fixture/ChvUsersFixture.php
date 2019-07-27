<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChvUsersFixture
 */
class ChvUsersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'user_id' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_username' => ['type' => 'string', 'length' => 191, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_date' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_date_gmt' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_email' => ['type' => 'string', 'length' => 191, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_avatar_filename' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_facebook_username' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_twitter_username' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_website' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_background_filename' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_bio' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_timezone' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_language' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_status' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_is_admin' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'user_is_manager' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'user_is_private' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'user_newsletter_subscribe' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'user_show_nsfw_listings' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'user_image_count' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_album_count' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_image_keep_exif' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'user_image_expiration' => ['type' => 'string', 'length' => 191, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_registration_ip' => ['type' => 'string', 'length' => 191, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_likes' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'Likes made to content owned by this user', 'precision' => null, 'autoIncrement' => null],
        'user_liked' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'Likes made by this user', 'precision' => null, 'autoIncrement' => null],
        'user_following' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_followers' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_content_views' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_notifications_unread' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'user_date_gmt' => ['type' => 'index', 'columns' => ['user_date_gmt'], 'length' => []],
            'user_status' => ['type' => 'index', 'columns' => ['user_status'], 'length' => []],
            'user_is_admin' => ['type' => 'index', 'columns' => ['user_is_admin'], 'length' => []],
            'user_is_manager' => ['type' => 'index', 'columns' => ['user_is_manager'], 'length' => []],
            'user_is_private' => ['type' => 'index', 'columns' => ['user_is_private'], 'length' => []],
            'user_newsletter_subscribe' => ['type' => 'index', 'columns' => ['user_newsletter_subscribe'], 'length' => []],
            'user_show_nsfw_listings' => ['type' => 'index', 'columns' => ['user_show_nsfw_listings'], 'length' => []],
            'user_image_count' => ['type' => 'index', 'columns' => ['user_image_count'], 'length' => []],
            'user_album_count' => ['type' => 'index', 'columns' => ['user_album_count'], 'length' => []],
            'user_image_keep_exif' => ['type' => 'index', 'columns' => ['user_image_keep_exif'], 'length' => []],
            'user_image_expiration' => ['type' => 'index', 'columns' => ['user_image_expiration'], 'length' => []],
            'user_registration_ip' => ['type' => 'index', 'columns' => ['user_registration_ip'], 'length' => []],
            'user_likes' => ['type' => 'index', 'columns' => ['user_likes'], 'length' => []],
            'user_following' => ['type' => 'index', 'columns' => ['user_following'], 'length' => []],
            'user_followers' => ['type' => 'index', 'columns' => ['user_followers'], 'length' => []],
            'user_liked' => ['type' => 'index', 'columns' => ['user_liked'], 'length' => []],
            'user_content_views' => ['type' => 'index', 'columns' => ['user_content_views'], 'length' => []],
            'searchindex' => ['type' => 'fulltext', 'columns' => ['user_name', 'user_username'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['user_id'], 'length' => []],
            'username' => ['type' => 'unique', 'columns' => ['user_username'], 'length' => []],
            'email' => ['type' => 'unique', 'columns' => ['user_email'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'user_id' => 1,
                'user_name' => 'Lorem ipsum dolor sit amet',
                'user_username' => 'Lorem ipsum dolor sit amet',
                'user_date' => '2019-07-18 06:47:30',
                'user_date_gmt' => '2019-07-18 06:47:30',
                'user_email' => 'Lorem ipsum dolor sit amet',
                'user_avatar_filename' => 'Lorem ipsum dolor sit amet',
                'user_facebook_username' => 'Lorem ipsum dolor sit amet',
                'user_twitter_username' => 'Lorem ipsum dolor sit amet',
                'user_website' => 'Lorem ipsum dolor sit amet',
                'user_background_filename' => 'Lorem ipsum dolor sit amet',
                'user_bio' => 'Lorem ipsum dolor sit amet',
                'user_timezone' => 'Lorem ipsum dolor sit amet',
                'user_language' => 'Lorem ipsum dolor sit amet',
                'user_status' => 'Lorem ipsum dolor sit amet',
                'user_is_admin' => 1,
                'user_is_manager' => 1,
                'user_is_private' => 1,
                'user_newsletter_subscribe' => 1,
                'user_show_nsfw_listings' => 1,
                'user_image_count' => 1,
                'user_album_count' => 1,
                'user_image_keep_exif' => 1,
                'user_image_expiration' => 'Lorem ipsum dolor sit amet',
                'user_registration_ip' => 'Lorem ipsum dolor sit amet',
                'user_likes' => 1,
                'user_liked' => 1,
                'user_following' => 1,
                'user_followers' => 1,
                'user_content_views' => 1,
                'user_notifications_unread' => 1
            ],
        ];
        parent::init();
    }
}
