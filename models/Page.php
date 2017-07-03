<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property string $id
 * @property string $user_id
 * @property integer $live
 * @property string $title
 * @property string $content
 * @property string $date_updated
 * @property string $date_published
 *
 * @property Comment[] $comments
 * @property User $user
 * @property PageHasFile[] $pageHasFiles
 * @property File[] $files
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title'], 'required'],
            [['user_id', 'live'], 'integer'],
            [['content'], 'string'],
            [['date_updated', 'date_published'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'live' => 'Live',
            'title' => 'Title',
            'content' => 'Content',
            'date_updated' => 'Date Updated',
            'date_published' => 'Date Published',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageHasFiles()
    {
        return $this->hasMany(PageHasFile::className(), ['page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['id' => 'file_id'])->viaTable('page_has_file', ['page_id' => 'id']);
    }

public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        // Place your custom code here
	$	this->title='no matter what';
        return true;
    } else {
        return false;
    }
}
}
