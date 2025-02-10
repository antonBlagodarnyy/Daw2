<?php
class Task
{
    private $id;
    private $title;
    private $description;
    private $status = "pending";

    public function __construct(string $title, string $description)
    {
        $this->id = uniqid();
        $this->title = $title;
        $this->description = $description;
    }

    // Getters
    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    // Setters
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // __toString method
    public function __toString(): string
    {
        return "Task [ID: {$this->id}, Title: {$this->title}, Description: {$this->description}, Status: {$this->status}]";
    }
}
