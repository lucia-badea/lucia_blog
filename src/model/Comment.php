<?php

namespace App\src\model;

class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titleComment;

    /**
     * @var string
     */
    private $contentComment;

    /**
     * @var string
     */
    private $authorComment;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var bool
     */
    private $published;

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
    public function getTitleComment()
    {
        return $this->titleComment;
    }

    /**
     * @param string $titleComment
     */
    public function setTitleComment($titleComment)
    {
        $this->titleComment = $titleComment;
    }


    /**
     * @return string
     */
    public function getContentComment()
    {
        return $this->contentComment;
    }

    /**
     * @param string $contentComment
     */
    public function setContentComment($contentComment)
    {
        $this->contentComment = $contentComment;
    }

    /**
     * @return string
     */
    public function getAuthorComment()
    {
        return $this->authorComment;
    }

    /**
     * @param string $authorComment
     */
    public function setAuthorComment($authorComment)
    {
        $this->authorComment = $authorComment;
    }

    /**
     * @return \DateTime
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return bool
     */
    public function isApprovedComment()
    {
        return $this->published;
    }

    /**
     * @param bool $published
     */
    public function setIsApprovedComment($published)
    {
        $this->published = $published;
    }
}
