<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
<<<<<<< HEAD
     * @return array<int, string|null>
     */
    public function hosts(): array
=======
     * @return array
     */
    public function hosts()
>>>>>>> 0c87cc8 (mentor2)
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
