#include <bits/stdc++.h>
using namespace std;
int t, n, x;
vector<int> v;

int main()
{
  freopen("VPP.INP", "r", stdin);
  freopen("VPP.OUT", "w", stdout);

  cin >> t;
  while (t--)
  {
    cin >> n;
    if (n == 1)
    {
      cin >> x;
      v.push_back(x);
    }
    else
    {
      if (v.size() != 0)
        v.pop_back();
    }
  }
  if (v.size() == 0)
    cout << "EMPTY";
  else
    for (int x : v)
      cout << x << ' ';
  return 0;
}
