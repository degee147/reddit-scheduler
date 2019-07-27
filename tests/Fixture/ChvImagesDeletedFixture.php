<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChvImagesDeletedFixture
 */
class ChvImagesDeletedFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'chv_images_deleted';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'image_id' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'image_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_extension' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_size' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_width' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_height' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_date' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'image_date_gmt' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'image_title' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_description' => ['type' => 'text', 'length' => 16777215, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'image_nsfw' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'image_user_id' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_album_id' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_uploader_ip' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_storage_mode' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'datefolder', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_path' => ['type' => 'string', 'length' => 4096, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_storage_id' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_md5' => ['type' => 'string', 'length' => 32, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_source_md5' => ['type' => 'string', 'length' => 32, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_original_filename' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_original_exifdata' => ['type' => 'text', 'length' => 4294967295, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'image_views' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_category_id' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_chain' => ['type' => 'tinyinteger', 'length' => 128, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'image_thumb_size' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_medium_size' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_expiration_date_gmt' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'image_likes' => ['type' => 'biginteger', 'length' => 32, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'image_is_animated' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'rapid_response' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'pending_review' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'reviewed' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'api_rating' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'api_age' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'image_name' => ['type' => 'index', 'columns' => ['image_name'], 'length' => ['image_name' => '191']],
            'image_extension' => ['type' => 'index', 'columns' => ['image_extension'], 'length' => ['image_extension' => '191']],
            'image_size' => ['type' => 'index', 'columns' => ['image_size'], 'length' => []],
            'image_width' => ['type' => 'index', 'columns' => ['image_width'], 'length' => []],
            'image_height' => ['type' => 'index', 'columns' => ['image_height'], 'length' => []],
            'image_date_gmt' => ['type' => 'index', 'columns' => ['image_date_gmt'], 'length' => []],
            'image_nsfw' => ['type' => 'index', 'columns' => ['image_nsfw'], 'length' => []],
            'image_user_id' => ['type' => 'index', 'columns' => ['image_user_id'], 'length' => []],
            'image_album_id' => ['type' => 'index', 'columns' => ['image_album_id'], 'length' => []],
            'image_uploader_ip' => ['type' => 'index', 'columns' => ['image_uploader_ip'], 'length' => ['image_uploader_ip' => '191']],
            'image_storage_mode' => ['type' => 'index', 'columns' => ['image_storage_mode'], 'length' => []],
            'image_path' => ['type' => 'index', 'columns' => ['image_path'], 'length' => ['image_path' => '191']],
            'image_storage_id' => ['type' => 'index', 'columns' => ['image_storage_id'], 'length' => []],
            'image_md5' => ['type' => 'index', 'columns' => ['image_md5'], 'length' => []],
            'image_source_md5' => ['type' => 'index', 'columns' => ['image_source_md5'], 'length' => []],
            'image_views' => ['type' => 'index', 'columns' => ['image_views'], 'length' => []],
            'image_category_id' => ['type' => 'index', 'columns' => ['image_category_id'], 'length' => []],
            'image_chain' => ['type' => 'index', 'columns' => ['image_chain'], 'length' => []],
            'image_expiration_date_gmt' => ['type' => 'index', 'columns' => ['image_expiration_date_gmt'], 'length' => []],
            'image_likes' => ['type' => 'index', 'columns' => ['image_likes'], 'length' => []],
            'image_is_animated' => ['type' => 'index', 'columns' => ['image_is_animated'], 'length' => []],
            'image_album_id_image_id' => ['type' => 'index', 'columns' => ['image_album_id', 'image_id'], 'length' => []],
            'searchindex' => ['type' => 'fulltext', 'columns' => ['image_name', 'image_title', 'image_description', 'image_original_filename'], 'length' => []],
            'image_name_2' => ['type' => 'fulltext', 'columns' => ['image_name'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['image_id'], 'length' => []],
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
                'image_id' => 1,
                'image_name' => 'Lorem ipsum dolor sit amet',
                'image_extension' => 'Lorem ipsum dolor sit amet',
                'image_size' => 1,
                'image_width' => 1,
                'image_height' => 1,
                'image_date' => '2019-07-23 18:26:19',
                'image_date_gmt' => '2019-07-23 18:26:19',
                'image_title' => 'Lorem ipsum dolor sit amet',
                'image_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'image_nsfw' => 1,
                'image_user_id' => 1,
                'image_album_id' => 1,
                'image_uploader_ip' => 'Lorem ipsum dolor sit amet',
                'image_storage_mode' => 'Lorem ipsum dolor sit amet',
                'image_path' => 'Lorem ipsum dolor sit amet',
                'image_storage_id' => 1,
                'image_md5' => 'Lorem ipsum dolor sit amet',
                'image_source_md5' => 'Lorem ipsum dolor sit amet',
                'image_original_filename' => 'Lorem ipsum dolor sit amet',
                'image_original_exifdata' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'image_views' => 1,
                'image_category_id' => 1,
                'image_chain' => 1,
                'image_thumb_size' => 1,
                'image_medium_size' => 1,
                'image_expiration_date_gmt' => '2019-07-23 18:26:19',
                'image_likes' => 1,
                'image_is_animated' => 1,
                'rapid_response' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'pending_review' => 1,
                'reviewed' => 1,
                'api_rating' => 'Lorem ipsum dolor sit amet',
                'api_age' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
