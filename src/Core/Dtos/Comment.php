<?php declare(strict_types=1);

namespace SDK\Core\Dtos;

/**
 * This is the element comment main class.
 * The elements comments will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Comment::getAnswers()
 * @see Comment::getNick()
 * @see Comment::getComment()
 *
 * @see Element
 *
 * @package SDK\Core\Dtos
 */
abstract class Comment extends Element {

    protected array $answers = [];

    protected string $nick = '';

    protected string $comment = '';

    /**
     * Returns the blog post comment answers.
     *
     * @return array
     */
    public function getAnswers(): array {
        return $this->answers;
    }

    protected function setAnswers(array $answers): void {
        $this->answers = $this->setArrayField($answers, static::class);
    }

    /**
     * Returns the blog post comment nick.
     *
     * @return string
     */
    public function getNick(): string {
        return $this->nick;
    }

    /**
     * Returns the comment content.
     *
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
    }
}
