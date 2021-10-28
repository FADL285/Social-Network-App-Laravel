# Social Network App Laravel

## Notes:
* Add Accept: application/json in headers in all requests
* Add Authorization: Bearer {token} in headers in requests requires Authentication 

    Example: Bearer 2|8uPfGUbEQIrVYrht0ag72AgueiTceq54EThxtybB

<hr>

| Model | EndPoints | Requires Authentication |
|--- | --- | --- |
| Authentication | [Login](#login), [Register](#register) | no |
| Profile | [Show](#show-profile), [Update](#update-profile) | yes |
| Friend Request | [Send](#send-friend-request), [accept](#accept-friend-request), [remove](#remove-friend-request)  | yes |
| Post | [Index](#index-post), [Create](#create-post), [Update](#update-post), [Show](#show-post),[Delete](#delete-post) | yes |
| Like | [Like](#like) | yes |
| Comment | [Comment](#comment) | yes |

# Register

**Create Account** 

* URL

    https://social-app-laravel.herokuapp.com/api/register

* Method

    `POST`

* Requires

    `name=[name]`,`email=[email]` , `password=[password]`

* Return

    `token`

* Note

    > Save Token and Send in headers with Authorization = Bearer {saved token}

<hr>

# Login

**Login With Registed Account**

* URL

    https://social-app-laravel.herokuapp.com/api/login

* Method

    `POST`

* Requires

    `email=[email]` , `password=[password]`

* Return

    `token`

* Note

    > Save Token and Send in headers with Authorization = Bearer {saved token}

<hr>

# Show Profile

**Showing Authenicated User Data**

* URL

    https://social-app-laravel.herokuapp.com/api/profile

* Method

    `GET`

* Return

    `data`

<hr>

# Update Profile

**Login With Registed Account**

* URL

    https://social-app-laravel.herokuapp.com/api/profile

* Method

    `POST`

* Requires

    `name=[string]`,`email=[email]` 

* Nullable

    `password=[password]` , `avatar=[image]`


* Return

    `data`
    
<hr>

# Send Friend Request

**Send Friend Request To Another User**

* URL

    https://social-app-laravel.herokuapp.com/api/friend/send

* Method

    `POST`

* Requires

    `friend_id=[number]` 

* Return

    `message`

* Note 

    > friend_id is user id that you want to send friend request to him

    
<hr>

# Accept Friend Request

**Accept Friend Request**

* URL

    https://social-app-laravel.herokuapp.com/api/friend/accept

* Method

    `POST`

* Requires

    `friend_id=[number]` 

* Return

    `message`

* Note 

    > friend_id is user id u did sent friend request to him

    
<hr>

# Remove Friend Request

**Remove Friend Request (Unfriended)**

* URL

    https://social-app-laravel.herokuapp.com/api/friend/remove

* Method

    `DELETE`

* Requires

    `friend_id=[number]` 

* Return

    `message`

* Note 

    > friend_id is user id that you want to remove from your friends

    
<hr>

# Index Post

**Show All Posts**

* URL

    https://social-app-laravel.herokuapp.com/api/posts

* Method

    `GET` 

* Return

    `data`
   
<hr>

# Create Post

**Create Post With Authenticated User**

* URL

    https://social-app-laravel.herokuapp.com/api/posts

* Method

    `POST`

* Requires

    `body=[text]` Or `Image=[file:png,jpg]` 

* Return

    `data`

* Note 

    > To Create Post You Need To Send body or Image

    
<hr>

# Update Post

**Update Post With Authenticated User**

* URL

    https://social-app-laravel.herokuapp.com/api/{post_id}

* Method

    `PATCH`

* Requires

    `body=[text]` Or `Image=[file:png,jpg]` 

* Return

    `data`

* Note 

    > To Update Post You Need To Send body or Image

    
<hr>

# Show Post

**Show Single Post**

* URL

    https://social-app-laravel.herokuapp.com/api/posts/{post_id}

* Method

    `GET`

* Return

    `data`
   
<hr>

# Delete Post

**Show Single Post**

* URL

    https://social-app-laravel.herokuapp.com/api/posts/{post_id}

* Method

    `DELETE`

* Return

    `data`
   
<hr>

# Like

**Add Like To Post**

* URL

    https://social-app-laravel.herokuapp.com/api/like

* Method

    `POST`

* Requires

    `post_id=[number]`

* Return

    `data`

* Note 

    > If You add Like to specific post and this has like from this user like will be removed from this post
   
<hr>


# Comment

**Add Comment To Post**

* URL

    https://social-app-laravel.herokuapp.com/api/comment

* Method

    `POST`

* Requires

    `post_id=[number]` , `body=[text]`

* Return

    `data`
   
<hr>