{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <div class="page-header" style="color: #5a5a5a;">
        <h1>Login</h1>
    </div>
    <form class="form-horizontal" action="{Router::url('/home/login')}" method="POST">
        <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
                <input type="email" name="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
                <input type="password" name="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">Sign in</button>
            </div>
        </div>
    </form>

{/block}
