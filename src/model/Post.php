<?php

namespace App\src\model;

class Post
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titlePost;

    /**
     * @var string
     */
    private $headerPost;

    /**
     * @var string
     */
    private $contentPost;

    /**
     * @var string
     */
    private $editor;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitlePost()
    {
        return $this->titlePost;
    }

    /**
     * @param string $titlePost
     */
    public function setTitlePost($titlePost)
    {
        $this->titlePost = $titlePost;
    }

    /**
     * @return string
     */
    public function getHeaderPost()
    {
        return $this->headerPost;
    }

    /**
     * @param string $headerPost
     */
    public function setHeaderPost($headerPost)
    {
        $this->headerPost = $headerPost;
    }

    /**
     * @return string
     */
    public function getContentPost()
    {
        return $this->contentPost;
    }

    /**
     * @param string $contentPost
     */
    public function setContentPost($contentPost)
    {
        $this->contentPost = $contentPost;
    }

        /**
     * @return string
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @param string $editor
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }
    
    /**
     * @param \DateTime $updated_at
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}