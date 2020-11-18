<?php

namespace TeamTeaTime\Forum\Http\Controllers\Web\Bulk;

use Illuminate\Http\RedirectResponse;
use TeamTeaTime\Forum\Http\Controllers\Web\BaseController;
use TeamTeaTime\Forum\Http\Requests\Bulk\DeletePosts;
use TeamTeaTime\Forum\Http\Requests\Bulk\RestorePosts;

class PostController extends BaseController
{
    public function destroy(DeletePosts $request): RedirectResponse
    {
        $result = $request->fulfill();

        if (is_null($result)) return $this->invalidSelectionResponse();

        return $this->bulkActionResponse($result->count(), 'posts.deleted');
    }

    public function restore(RestorePosts $request): RedirectResponse
    {
        $result = $request->fulfill();

        if (is_null($result)) return $this->invalidSelectionResponse();

        return $this->bulkActionResponse($result->count(), 'posts.updated');
    }
}
