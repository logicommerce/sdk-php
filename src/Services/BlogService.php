<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Blog\BlogCategory;
use SDK\Dtos\Blog\Blogger;
use SDK\Dtos\Blog\BlogPost;
use SDK\Dtos\Blog\BlogPostComment;
use SDK\Dtos\Blog\BlogTag;
use SDK\Dtos\Common\DataFile;
use SDK\Services\Parameters\Groups\Blog\AddBlogPostCommentParametersGroup;
use SDK\Services\Parameters\Groups\Blog\BlogCategoryParametersGroup;
use SDK\Services\Parameters\Groups\Blog\BloggerParametersGroup;
use SDK\Services\Parameters\Groups\Blog\BlogPostCommentsParametersGroup;
use SDK\Services\Parameters\Groups\Blog\BlogPostParametersGroup;
use SDK\Services\Parameters\Groups\Blog\BlogPostRateParametersGroup;
use SDK\Services\Parameters\Groups\Blog\BlogSubscriptionParametersGroup;
use SDK\Services\Parameters\Groups\Blog\BlogTagParametersGroup;

/**
 * This is the blog service class.
 * This class will retrieve the blogs from LogiCommerce API and transform them to objects.
 * All the needed blog operations previous to Framework must be done here.
 *
 * @see BlogService::getBlogCategories()
 * @see BlogService::getBlogCategory()
 * @see BlogService::getBlogPosts()
 * @see BlogService::getBlogPost()
 * @see BlogService::getBloggers()
 * @see BlogService::getBlogger()
 * @see BlogService::getTags()
 * @see BlogService::getTag()
 * @see BlogService::getRss()
 * @see BlogService::getBlogPostComments()
 * @see BlogService::postAddComment()
 * @see BlogService::postRate()
 * @see BlogService::postLike()
 * @see BlogService::postDeleteLike()
 * @see BlogService::postDislike()
 * @see BlogService::postDeleteDislike()
 * @see BlogService::postDoneHit()
 * @see BlogService::subscribe()
 * @see BlogService::unsubscribe()
 * @see BlogService::categorySubscribe()
 * @see BlogService::categoryUnsubscribe()
 * @see BlogService::postSubscribe()
 * @see BlogService::postUnsubscribe()
 * @see Blog
 * @see BlogCategory
 * @see BlogPost
 * @see Blogger
 * @see BlogPostComment
 * @see DataFile
 *
 * @see BlogService::addGetBlogCategories()
 * @see BlogService::addGetBlogCategory()
 * @see BlogService::addGetBlogPosts()
 * @see BlogService::addGetBlogPost()
 * @see BlogService::addGetBloggers()
 * @see BlogService::addGetBlogger()
 * @see BlogService::addGetTags()
 * @see BlogService::addGetTag()
 * @see BlogService::addGetRss()
 * @see BlogService::addGetBlogPostComments()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @uses RelatedItemsTrait
 * @see RelatedItemsTrait
 *
 * @package SDK\Services
 */
class BlogService extends Service {
    use ServiceTrait, RelatedItemsTrait;

    private const RELATED_ITEMS = Resource::BLOG_POSTS_ID_RELATED;

    private const RELATED_ITEMS_TYPE = Resource::BLOG_POSTS_ID_RELATED_TYPE;

    private const REGISTRY_KEY = Registry::BLOG_MODEL;

    /**
     * Returns the blog categories filtered with the given parameters
     *
     * @param BlogCategoryParametersGroup $params
     *            object with the needed filters to send to the API blogs resource
     *
     * @return ElementCollection|NULL
     */
    public function getBlogCategories(BlogCategoryParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(BlogCategory::class, Resource::BLOG_CATEGORIES, $params);
    }

    /**
     * Returns the blog category identified by the given id
     *
     * @param int $id
     *
     * @return BlogCategory|NULL
     */
    public function getBlogCategory(int $id = 0): ?BlogCategory {
        return $this->getElement(BlogCategory::class, Resource::BLOG_CATEGORIES_ID, $id);
    }

    /**
     * Returns the blog posts filtered with the given parameters
     *
     * @param BlogPostParametersGroup $params
     *            object with the needed filters to send to the API blogs resource
     *
     * @return ElementCollection|NULL
     */
    public function getBlogPosts(BlogPostParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(BlogPost::class, Resource::BLOG_POSTS, $params);
    }

    /**
     * Returns the blog post identified by the given id
     *
     * @param int $id
     *
     * @return BlogPost|NULL
     */
    public function getBlogPost(int $id = 0): ?BlogPost {
        return $this->getElement(BlogPost::class, Resource::BLOG_POSTS_ID, $id);
    }

    /**
     * Returns the blog bloggers filtered with the given parameters
     *
     * @param BloggerParametersGroup $params
     *            object with the needed filters to send to the API blogs resource
     *
     * @return ElementCollection|NULL
     */
    public function getBloggers(BloggerParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Blogger::class, Resource::BLOG_BLOGGERS, $params);
    }

    /**
     * Returns the blog blogger identified by the given id
     *
     * @param int $id
     *
     * @return Blogger|NULL
     */
    public function getBlogger(int $id = 0): ?Blogger {
        return $this->getElement(Blogger::class, Resource::BLOG_BLOGGERS_ID, $id);
    }

    /**
     * Returns the blog tags filtered with the given parameters
     *
     * @param BlogTagParametersGroup $params
     *            object with the needed filters to send to the API blogs resource
     *
     * @return ElementCollection|NULL
     */
    public function getTags(BlogTagParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(BlogTag::class, Resource::BLOG_TAGS, $params);
    }

    /**
     * Returns the blog tag identified by the given id
     *
     * @param int $id
     *
     * @return BlogTag|NULL
     */
    public function getTag(int $id = 0): ?BlogTag {
        return $this->getElement(BlogTag::class, Resource::BLOG_TAGS_ID, $id);
    }

    /**
     * Returns the blog rss filtered with the given parameters
     *
     * @param BlogPostParametersGroup $params
     *            object with the needed filters to send to the API blogs resource
     *
     * @return ElementCollection|NULL
     */
    public function getRss(BlogPostParametersGroup $params = null): ?DataFile {
        return $this->getResourceElement(DataFile::class, Resource::BLOG_RSS, $params);
    }

    /**
     * Returns the blog post comments filtered with the given parameters
     *
     * @param int $id
     * @param BlogPostCommentsParametersGroup $params
     *            object with the needed filters to send to the API posts/comments resource
     *
     * @return ElementCollection|NULL
     */
    public function getBlogPostComments(int $id = 0, BlogPostCommentsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(
            BlogPostComment::class,
            $this->replaceWildcards(Resource::BLOG_POSTS_ID_COMMENTS, ['id' => $id]),
            $params
        );
    }

    /**
     * Add a new comment into the blog post that matches the given id
     *
     * @param int $id
     * @param AddBlogPostCommentParametersGroup $comment
     *            object with the needed data to add a new comment
     *
     * @return BlogPostComment|NULL
     */
    public function postAddComment(int $id = 0, AddBlogPostCommentParametersGroup $comment = null): ?BlogPostComment {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::BLOG_POSTS_ID_COMMENTS)->method(self::POST)->pathParams(['id' => $id])->body($comment)
                    ->build()
            ),
            BlogPostComment::class
        );
    }

    /**
     * Add a rating into the blog post that matches the given id
     *
     * @param int $id
     * @param int $rating
     *            (must be into the 0-5 range)
     *
     * @return Status|NULL
     */
    public function postRate(int $id = 0, int $rating = 0): ?Status {
        $data = new BlogPostRateParametersGroup();
        $data->setRating($rating);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::BLOG_POSTS_ID_RATE)->method(self::POST)->pathParams(['id' => $id])->body($data)
                    ->build()
            ),
            Status::class
        );
    }

    /**
     * Add a like into the blog post that matches the given id
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function postLike(int $id = 0): ?Status {
        return $this->doPostAction($id, Resource::BLOG_POSTS_ID_LIKE);
    }

    /**
     * Delete a like into the blog post that matches the given id
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function postDeleteLike(int $id = 0): ?Status {
        return $this->doPostAction($id, Resource::BLOG_POSTS_ID_LIKE, self::DELETE);
    }

    /**
     * Add a dislike into the blog post that matches the given id
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function postDislike(int $id = 0): ?Status {
        return $this->doPostAction($id, Resource::BLOG_POSTS_ID_DISLIKE);
    }

    /**
     * Delete a dislike into the blog post that matches the given id
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function postDeleteDislike(int $id = 0): ?Status {
        return $this->doPostAction($id, Resource::BLOG_POSTS_ID_DISLIKE, self::DELETE);
    }

    /**
     * Increase the post that matches the given id hit counter
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function postDoneHit(int $id = 0): ?Status {
        return $this->doPostAction($id, Resource::BLOG_POSTS_ID_DONE_HIT);
    }

    private function doPostAction(int $id, string $resource, string $method = self::POST): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($resource)->method($method)->pathParams(['id' => $id])->build()),
            Status::class
        );
    }

    /**
     * Subscribe the current user to the blog.
     * If no user is loged in, email is required.
     *
     * @param string $email
     *
     * @return Status|NULL
     */
    public function subscribe(string $email = ''): ?Status {
        $body = null;
        if (strlen($email) !== 0) {
            $body = new BlogSubscriptionParametersGroup();
            $body->setEmail($email);
        }
        return $this->doSubscribe(Resource::BLOG_SUBSCRIBE, [], $body);
    }

    /**
     * Unsubscribe the current user to the blog.
     * If no user is loged in, token is required.
     *
     * @param string $token
     *
     * @return Status|NULL
     */
    public function unsubscribe(string $token = ''): ?Status {
        $resource = Resource::BLOG_SUBSCRIBE;
        $pathParams = [];
        if (strlen($token) !== 0) {
            $resource = Resource::BLOG_SUBSCRIBE_TOKEN;
            $pathParams = [
                'token' => $token
            ];
        }
        return $this->doUnsubscribe($resource, $pathParams);
    }

    /**
     * Subscribe the current user to the blog category that matches the given id.
     * If no user is loged in, email is required.
     *
     * @param int $id
     * @param string $email
     *
     * @return Status|NULL
     */
    public function categorySubscribe(int $id, string $email = ''): ?Status {
        $body = null;
        if (strlen($email) !== 0) {
            $body = new BlogSubscriptionParametersGroup();
            $body->setEmail($email);
        }
        return $this->doSubscribe(Resource::BLOG_CATEGORIES_ID_SUBSCRIBE, [
            'id' => $id
        ], $body);
    }

    /**
     * Unsubscribe the current user to the blog category that matches the given id.
     * If no user is loged in, email is required.
     *
     * @param int $id
     * @param string $token
     *
     * @return Status|NULL
     */
    public function categoryUnsubscribe(int $id, string $token = ''): ?Status {
        $resource = Resource::BLOG_CATEGORIES_ID_SUBSCRIBE;
        $pathParams = [
            'id' => $id
        ];
        if (strlen($token) !== 0) {
            $resource = Resource::BLOG_CATEGORIES_ID_SUBSCRIBE_TOKEN;
            $pathParams['token'] = $token;
        }
        return $this->doUnsubscribe($resource, $pathParams);
    }

    /**
     * Subscribe the current user to the blog post that matches the given id.
     * If no user is loged in, email is required.
     *
     * @param int $id
     * @param string $email
     *
     * @return Status|NULL
     */
    public function postSubscribe(int $id, string $email = ''): ?Status {
        $body = null;
        if (strlen($email) !== 0) {
            $body = new BlogSubscriptionParametersGroup();
            $body->setEmail($email);
        }
        return $this->doSubscribe(Resource::BLOG_POSTS_ID_SUBSCRIBE, [
            'id' => $id
        ], $body);
    }

    /**
     * Unsubscribe the current user to the blog post that matches the given id.
     * If no user is loged in, email is required.
     *
     * @param int $id
     * @param string $token
     *
     * @return Status|NULL
     */
    public function postUnsubscribe(int $id, string $token = ''): ?Status {
        $resource = Resource::BLOG_POSTS_ID_SUBSCRIBE;
        $pathParams = [
            'id' => $id
        ];
        if (strlen($token) !== 0) {
            $resource = Resource::BLOG_POSTS_ID_SUBSCRIBE_TOKEN;
            $pathParams['token'] = $token;
        }
        return $this->doUnsubscribe($resource, $pathParams);
    }

    /**
     * Subscribe the user with the given parameters.
     *
     * @param string $resource
     * @param array $pathParams
     * @param ParametersGroup $body
     *
     * @return Status|NULL
     */
    private function doSubscribe(string $resource, array $pathParams, ParametersGroup $body = null): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($resource)->pathParams($pathParams)->body($body)->method(self::POST)->build()),
            Status::class
        );
    }

    /**
     * Unsubscribe the user with the given parameters.
     *
     * @param string $resource
     * @param array $pathParams
     *
     * @return Status|NULL
     */
    private function doUnsubscribe(string $resource, array $pathParams): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($resource)->pathParams($pathParams)->method(self::DELETE)->build()),
            Status::class
        );
    }

    /**
     * Add the request to get the blog categories filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BlogCategoryParametersGroup $params
     *
     * @return void
     */
    public function addGetBlogCategories(
        BatchRequests $batchRequests,
        string $batchName,
        BlogCategoryParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_CATEGORIES)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the blog category identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetBlogCategory(BatchRequests $batchRequests, string $batchName, int $id = 0): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_CATEGORIES_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the blog posts filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BlogPostParametersGroup $params
     *
     * @return void
     */
    public function addGetBlogPosts(BatchRequests $batchRequests, string $batchName, BlogPostParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_POSTS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the blog post identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetBlogPost(BatchRequests $batchRequests, string $batchName, int $id = 0): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_POSTS_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the blog bloggers filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BloggerParametersGroup $params
     *
     * @return void
     */
    public function addGetBloggers(BatchRequests $batchRequests, string $batchName, BloggerParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_BLOGGERS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the blog blogger identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetBlogger(BatchRequests $batchRequests, string $batchName, int $id = 0): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_BLOGGERS_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the blog tags filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BlogTagParametersGroup $params
     *
     * @return void
     */
    public function addGetTags(BatchRequests $batchRequests, string $batchName, BlogTagParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_TAGS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the blog tag identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetTag(BatchRequests $batchRequests, string $batchName, int $id = 0): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_TAGS_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the blog rss filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BlogPostParametersGroup $params
     *
     * @return void
     */
    public function addGetRss(BatchRequests $batchRequests, string $batchName, BlogPostParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::BLOG_RSS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the blog post comments filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param BlogPostCommentsParametersGroup $params
     *
     * @return void
     */
    public function addGetBlogPostComments(
        BatchRequests $batchRequests,
        string $batchName,
        int $id = 0,
        BlogPostCommentsParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::BLOG_POSTS_ID_COMMENTS)->pathParams(['id' => $id])->urlParams($params)
                ->build()
        );
    }
}
