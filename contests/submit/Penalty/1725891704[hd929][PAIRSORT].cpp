#include <bits/stdc++.h>
using namespace std;
const int N = 1e6;
int n;
vector<pair<int, int>> ps;

int kcO(int a, int b)
{
  return sqrt(a * a + b * b);
}

bool xuli(pair<int, int> a, pair<int, int> b)
{
  if (kcO(a.first, a.second) == kcO(b.first, b.second))
  {
    if (a.first == b.first)
      return a.second < b.second;
    return a.first < b.first;
  }
  return kcO(a.first, a.second) < kcO(b.first, b.second);
}

int main()
{
  freopen("PAIRSORT.INP", "r", stdin);
  freopen("PAIRSORT.OUT", "w", stdout);

  cin >> n;
  ps.resize(n);
  for (int i = 0; i < n; i++)
    cin >> ps[i].first >> ps[i].second;

  sort(ps.begin(), ps.end(), xuli);
  for (int i = 0; i < n; i++)
    cout << ps[i].first << ' ' << ps[i].second << endl;

  return 0;
}
