defmodule InvonticApiWeb.SessionController do
  use InvonticApiWeb, :controller

  def new(conn, _) do
    render(conn, "new.html")
  end

  def create(conn, %{"session" => %{"username" => username, "password" => pass}}) do
    case InvonticApi.Accounts.authenticate_by_username_and_pass(username, pass) do
      {:ok, user} ->
        conn
        |> InvonticApiWeb.Auth.login(user)
        |> put_flash(:info, "Welcom back!")
        |> redirect(to: Routes.page_path(conn, :index))
      {:error, _reason} ->
        conn
        |> put_flash(:error, "Invalid username/password")
        |> render("new.html")
    end
  end

  def delete(conn, _) do
    conn
    |> InvonticApiWeb.Auth.logout()
    |> put_flash(:info, "You have been logged out")
    |> redirect(to: Routes.page_path(conn, :index))
  end

end
