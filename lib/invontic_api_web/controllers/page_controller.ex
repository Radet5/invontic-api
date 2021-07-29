defmodule InvonticApiWeb.PageController do
  use InvonticApiWeb, :controller

  def index(conn, _params) do
    render(conn, "index.html")
  end
end
